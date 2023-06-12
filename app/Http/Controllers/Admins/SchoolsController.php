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
use DateTime;


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
$token_b = $response['payee'];
$token_c = $token_b['partyId'];
$amount = $response['amount'];
$currency = $response['currency'];


// dd($amount);

$date = Carbon::now()->format('d F y');

$month = Carbon::now()->format('F y');


$year = Carbon::now()->format('y');



            apiTransfers::create([

            'student_acct_no' => $student_acct,
            'school_id' => $singleStudent->school_id,
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
       
      $allData = apiTransfers::select('school_id')->groupBy('school_id')->get();
        
      return view('Admin_section.transactions.money_transfers',compact('allData'));
  
  
    }
  

    
      
  public function BulkMoneyTransferGet(Request $request){

    $disbursement = new Disbursement();

    $transactionId = rand(1,10000);

    $school_codes = $request->input('school_id_no');

    $phone1 = $request->input('phone1');
		$amount = $request->input('amount');
    $postData = $request->all();

		$mobileNumber = implode('',$postData['phone1']);

		$arr = str_split($mobileNumber,'13');
		$partyId  = implode(",",$arr);


   $merchant_no = $request->merchant_no;


    $momoTransactionId = $disbursement->transfer($transactionId, $partyId, $amount);

    $response = $disbursement->getTransactionStatus($momoTransactionId);



    $token_obj = $response['status'];
    $token_b = $response['payee'];
    $token_c = $token_b['partyId'];
    $amount = $response['amount'];
    $currency = $response['currency'];


    $date = Carbon::now()->format('d F y');

$month = Carbon::now()->format('F y');


$year = Carbon::now()->format('y');

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



$check = User::where('name',$name)->where('email', $email)->where('school_tel1', $phone1)->where('school_tel2', $phone2)->where('school_address', $address)->first();

if($check == null){


  DB::transaction(function() use($request){
    

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
      $user->school_id_no = $final_id_no;
  $user->name = $request->name;
  $user->email = $request->email;
  $user->school_tel1 = $request->school_tel1;
  $user->school_tel2 = $request->school_tel2;
  $user->school_address = $request->school_address;
  $user->password = Hash::make($request->password);
  $user->type = 1;


  if ($request->file('school_logo_path')) {
    $file = $request->file('school_logo_path');
    $filename = date('YmdHi').$file->getClientOriginalName();
    $file->move(public_path('upload/logo'),$filename);
    $user['school_logo_path'] = $filename;
  }
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
   
  $user = User::where('id',$id)->first();   
  $user->name = $request->name;
  $user->email = $request->email;
  $user->school_tel1 = $request->school_tel1;
  $user->school_tel2 = $request->school_tel2;
  $user->school_address = $request->school_address;

  if ($request->file('school_logo_path')) {
$file = $request->file('school_logo_path');
@unlink(public_path('upload/logo/'.$user->school_logo_path));
$filename = date('YmdHi').$file->getClientOriginalName();
$file->move(public_path('upload/logo'),$filename);
$user['school_logo_path'] = $filename;
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



  






}
