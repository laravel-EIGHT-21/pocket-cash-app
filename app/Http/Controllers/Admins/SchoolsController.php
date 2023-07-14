<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Schools; 
use App\Models\SchoolStudent;
use App\Models\SchoolTransactions;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\apiTransfers;
use App\Products\Remittance;
use App\Products\Disbursement;
use App\Products\Collection;
use App\Models\User;
use App\Models\wallets;
use DateTime;
use Ramsey\Uuid\Uuid;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Crypt;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;
use Illuminate\Contracts\Encryption\DecryptException;


class SchoolsController extends Controller
{
 	


  function __construct()

    {

         $this->middleware('permission:view-schools|create-school|edit-school|money-transfers', ['only' => ['ViewSchools']]);

         $this->middleware('permission:create-school', ['only' => ['AddSchools','StoreSchools']]);

         $this->middleware('permission:edit-school', ['only' => ['EditSchools','UpdateSchools','inactiveSchools','activeSchools']]);

         $this->middleware('permission:money-transfers', ['only' => ['MoneyTransfers','BulkMoneyTransferGet']]);

    }



  
    
  public function TransferPocketCashView(){
		
    return view('parents.transfer_cash');

  }



      
  public function TransferPocketCashGet(Request $request){
		
    $remittance = new Collection();

  $transactionId = rand(1,10000);


  $amount = $request->amount;
  $partyId = $request->mobile;
  $student_acct = $request->acct_id;


  
  $singleStudent = User::where('student_code',$student_acct)->where('status',1)->where('type',2)->first();

  if ($singleStudent == true) {



$momoTransactionId = $remittance->requestToPay($transactionId, $partyId, $amount,$student_acct);

$response = $remittance->getTransactionStatus($momoTransactionId);

//  dd($response);

$token_obj = $response['status'];
$token_b = $response['payer'];
$token_c = $token_b['partyId'];
$amount = $response['amount'];
$currency = $response['currency'];


// dd($amount);

$date = Carbon::now()->format('d F y');

$month = Carbon::now()->format('F y');


$year = Carbon::now()->format('y');



        apiTransfers::create([

        'student_acct_no' => $student_acct,
        'uuid' => $singleStudent->uuid,
        'school_id' => $singleStudent->school_std_code,
        'amount' => $amount,
        'currency' => $currency,
        'reference_id' => $momoTransactionId,
        'externalId' => $transactionId,
        'payee_number' =>$token_c,
        'status' => $token_obj,
        'transfer_date' => $date,
        'transfer_month' => $month,
        'transfer_year' => $year,


       ]);

       $notification1 = array(
        'message' => 'TRANSFER HAS BEEN SENT...',
        'alert-type' => 'success'
      );
      
      return redirect()->back()->with($notification1);
    }
    else{ 
  
      $notification = array(
        'message' => 'NO MATCH FOR STUDENT ACCOUNT...',
        'alert-type' => 'error'
      );
  
      return redirect()->back()->with($notification);
  
        }


     



  }








    public function ViewTranfsers()
    {
     
        $allData = apiTransfers::latest()->get();

        
        
  return view('Admin_section.admins_view.api_transfer_status',compact('allData'));

    }




    


    public function MoneyTransfers()
    {
     
      $amount_total = SchoolTransactions::select('date')->groupBy('date')->sum('bulk_amount');
        $allData = SchoolTransactions::select('date')->groupBy('date')->latest()->get();
        
  return view('Admin_section.transactions.view_transactions',compact('allData','amount_total'));

    }


    public function BulkMoneyTransfers(Request $request){

      $date = Carbon::now()->format('d F y');
       
      $allData = apiTransfers::with(['school'])->select('school_id')->groupBy('school_id')->where('transfer_date',$date)->get();
        
      return view('Admin_section.transactions.money_transfers',compact('allData'));
  
  
    }
  

    
      
  public function BulkMoneyTransferGet(Request $request){

    

    $date_transfer = Carbon::now()->format('d F y');

    $disbursement = new Disbursement();
    $responses = [];

    $transactionId = rand(1,10000);
		$merchant_no = $request->merchant_no;

    
    $school_name = $request->input('name'); 

    $partyId = $request->input('school_tel1');
		$amount =  $request->input('amount');

    $recipients = [$school_name, $partyId, $amount];
    

      
    $singleStudent = SchoolTransactions::where('date',$date_transfer)->first();

    if ($singleStudent == false) {


    $momoTransactionId = $disbursement->transfer($transactionId, $recipients,$merchant_no);

    $response_disb = $disbursement->getTransactionStatus($momoTransactionId);

    $responses[] = $response_disb;

    $token_obj = $responses['status'];
    $token_b = $responses['payee'];
    $token_c = $token_b['partyId'];
    $amount = $responses['amount'];
    $currency = $responses['currency'];


    $date = Carbon::now()->format('d F y');

$month = Carbon::now()->format('F y');


$year = Carbon::now()->format('y');


SchoolTransactions::create([

  'payer_number' => $merchant_no,
  'name' => $school_name,
  'school_mobile' =>$token_c,
  'bulk_amount' => $amount,
  'currency' => $currency,
  'reference_id' => $momoTransactionId,
  'externalId' => $transactionId,
  'status' => $token_obj,
  'date' => $date,
  'month' => $month,
  'year' => $year,


 ]);

 $notification1 = array(
  'message' => 'BULK TRANSFER HAS BEEN SENT...',
  'alert-type' => 'success'
);

return redirect()->back()->with($notification1);

}
else{ 

  $notification = array(
    'message' => 'BULK TRANSFER HAS ALREADY BEEN MADE FOR TODAY...',
    'alert-type' => 'error'
  );

  return redirect()->back()->with($notification);

    }



  }









  public function BulkMoneyTransfersDetails($date){
    $data['details'] = SchoolTransactions::where('date',$date)->get();
    return view('Admin_section.transactions.money_transfers_details',$data);

  }




  
  public function ViewSchools(){

    $data['allData'] = User::where('type',1)->get();
  return view('Admin_section.schools_view.view_school',$data);
}



  

public function AddSchools(){

  return view('Admin_section.schools_view.add_school');
}






public function StoreSchools(Request $request){


$name = $request->name;
$email = $request->email;
  $phone1 = $request->school_tel1;
  $phone2 = $request->school_tel2;
  $address = $request->school_address;



$check = User::where('name',$name)->where('email', $email)->where('type', 1)->first();

if($check == null){


  DB::transaction(function() use($request){

    $uuid = Uuid::uuid4()->toString();


            
    $validatedData = $request->validate([

      'school_logo_path' => 'required|mimes:jpg,png|max:4096',

     ]);
    

    $students = User::orderBy('id','DESC')->first();

        if ($students == null) {
        $firstReg = 0;
        $studentId = $firstReg+1;
        if ($studentId < 10) {
          $id_no = '0'.$studentId;
        }elseif ($studentId < 100) {
          $id_no = '00'.$studentId;
        }elseif ($studentId < 1000) {
          $id_no = '000'.$studentId;
        }
    
  

      }else{
     $students = User::orderBy('id','DESC')->first()->id;
       $studentId = $students+1;
       if ($studentId < 10) {
          $id_no = '0'.$studentId;
        }elseif ($studentId < 100) {
          $id_no = '00'.$studentId;
        }elseif ($studentId < 1000) {
          $id_no = '000'.$studentId;
        }


      } // end else 

      $final_id_no = $id_no;

      $user = new User();
      $user->uuid = $uuid;
      $user->school_id_no = $final_id_no;
  $user->name = $request->name;
  $user->email = $request->email;
  $user->school_tel1 = $request->school_tel1;
  $user->school_tel2 = $request->school_tel2;
  $user->school_address = $request->school_address;
  $user->password = Hash::make($request->password);
  $user->type = 1;


  $image = $request->file('school_logo_path');
  $name_gen = $image->hashName().'.'.$image->extension();
  Image::make($image)->resize(102,102)->save('upload/logo/'.$name_gen);
  $save_url = $name_gen;
$user->school_logo_path = $save_url;
   $user->save();



  });


  $notification = array(
    'message' => 'New School Info Inserted Successfully',
    'alert-type' => 'success'
  );

  return redirect()->route('view.schools')->with($notification);

  
}


else{

$notification = array(
  'message' => 'SCHOOL`S RECORD ALREADY EXISTS!!!',
  'alert-type' => 'error'
);

return redirect()->back()->with($notification);

}



} // End Method 








public function EditSchools($id){
$data['editData'] = User::findOrFail($id);


  return view('Admin_section.schools_view.edit_school',$data);

}







public function UpdateSchools(Request $request, $id){

  DB::transaction(function() use($request,$id){

    //$old_img = $request->old_image;
   
  $user = User::where('id',$id)->first();   
  $user->name = $request->name;
  $user->email = $request->email;
  $user->school_tel1 = $request->school_tel1;
  $user->school_tel2 = $request->school_tel2;
  $user->school_address = $request->school_address;
  $old_img = $user->school_logo_path;
  

  
  if ($request->file('school_logo_path')) {

  @unlink(public_path('upload/logo/'.$old_img));
  $image = $request->file('school_logo_path');
  $name_gen = $image->hashName().'.'.$image->extension();
  Image::make($image)->resize(102,102)->save('upload/logo/'.$name_gen);
  $save_url = $name_gen;
  $user['school_logo_path'] = $save_url;
  

}

   $user->save();



  });
   

  $notification = array(
      'message' => 'School Info Updated Successfully',
      'alert-type' => 'success'
  );

  return redirect()->route('view.schools')->with($notification);


}// END METHOD




public function inactiveSchools($id)
{ 
User::findOrFail($id)->update(['status' => 0]);
    $notification = array(
        'message' => 'School Status Deactivated...',
        'alert-type' => 'error'
    );
    return redirect()->back()->with($notification);

}


public function activeSchools($id)
{
User::findOrFail($id)->update(['status' => 1]);
$notification = array(
    'message' => 'School Status Activated...',
    'alert-type' => 'success'
);
return redirect()->back()->with($notification);

}




  
public function ViewSchoolStudents(){

  $data['allData'] = User::where('type',2)->get();

  return view('Admin_section.schools_view.view_students',$data);
}









public function ViewDepositsReports(){

	return view('Admin_section.reports.view_reports');
}

  


public function ReportByWeek(Request $request){

  $sdate = date('d-m-y',strtotime($request->start_date));
  $edate = date('d-m-y',strtotime($request->end_date));
  $total_depo = apiTransfers::whereBetween('transfer_date',[$sdate,$edate])->sum('amount');
  $allData = apiTransfers::select('school_id','transfer_date')->groupBy('school_id','transfer_date')->whereBetween('transfer_date',[$sdate,$edate])->get();


  $start_date = date('Y-m-d',strtotime($request->start_date));
  $end_date = date('Y-m-d',strtotime($request->end_date));
  return view('Admin_section.reports.weekly_reports',compact('allData','total_depo','start_date','end_date'));

} // End 




public function ReportByMonth(Request $request){

	$month = Carbon::parse($request->month)->format('F y');	 

	$depo_total = apiTransfers::where('transfer_month',$month)->sum('amount');
	$allData = apiTransfers::select('school_id','transfer_month')->groupBy('school_id','transfer_month')->where('transfer_month',$month)->get();
  

	
	return view('Admin_section.reports.monthly_reports',compact('allData','month','depo_total'));

} // end mehtod 




public function ReportByYear(Request $request){


	$year= Carbon::parse($request->year)->format('y');
	$depo_total = apiTransfers::where('transfer_year',$year)->sum('amount');
	$allData = apiTransfers::select('school_id','transfer_month')->groupBy('school_id','transfer_month')->where('transfer_year',$year)->orderBy('created_at', 'asc')->groupBy('transfer_month')->get();


	return view('Admin_section.reports.yearly_reports',compact('allData','year','depo_total'));


} // end mehtod 










}
