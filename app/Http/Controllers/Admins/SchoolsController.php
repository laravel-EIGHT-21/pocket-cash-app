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


class SchoolsController extends Controller
{




  
    
  public function TransferPocketCashView(){
		
    return view('parents.transfer_cash');

  }



      
  public function TransferPocketCashGet(Request $request){
		
    $remittance = new Remittance();

    $transactionId = rand(1,10000);
    //$partyId = '0779913330';
    //$amount = '15000';

    $amount = $request->amount;
    $partyId = $request->mobile;
    $student_acct = $request->acct_id;

    
   // $school = SchoolStudent::where('acct_id',$student_acct)->get();
    //$school_id = $school->school_id;



		$singleStudent = SchoolStudent::where('acct_id',$student_acct)->where('status',1)->first();

		if ($singleStudent == true) {



    $momoTransactionId = $remittance->transfer($transactionId, $partyId, $amount,$student_acct);

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
              'payer_number' =>$token_c,
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





    
    
    public function ViewSchools(){

		  $data['allData'] = Schools::all();
    	return view('Admin_section.schools_view.view_school',$data);
    }



        
    
    public function AddSchools(){

      //$data['allData'] = User::all();
        return view('Admin_section.schools_view.add_school');
      }
  




      
    public function StoreSchools(Request $request){

	
      $name = $request->name;
      $email = $request->email;
        $phone1 = $request->phone1;
        $phone2 = $request->phone2;
        $address = $request->address;

  
    
    $check = Schools::where('name',$name)->where('email', $email)->where('phone1', $phone1)->where('phone2', $phone2)->where('address', $address)->first();
  
    if($check == null){
  
  
        DB::transaction(function() use($request){
          

          $students = Schools::orderBy('id','DESC')->first();
      
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
           $students = Schools::orderBy('id','DESC')->first()->id;
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
      
            $user = new Schools();
            $user->school_id_no = $final_id_no;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone1 = $request->phone1;
        $user->phone2 = $request->phone2;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
    
  
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
      $data['editData'] = Schools::findOrFail($id);
      
  
        return view('Admin_section.schools_view.edit_school',$data);
  
      }




      

    
    public function UpdateSchools(Request $request, $id){
    
    	DB::transaction(function() use($request,$id){
    	 
        $user = Schools::where('id',$id)->first();   
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone1 = $request->phone1;
        $user->phone2 = $request->phone2;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);

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
      Schools::findOrFail($id)->update(['status' => 0]);
          $notification = array(
              'message' => 'School Status Deactivated...',
              'alert-type' => 'error'
          );
          return redirect()->back()->with($notification);

  }


  public function activeSchools($id)
  {
      Schools::findOrFail($id)->update(['status' => 1]);
      $notification = array(
          'message' => 'School Status Activated...',
          'alert-type' => 'success'
      );
      return redirect()->back()->with($notification);

  }




        
    public function ViewSchoolStudents(){

		$data['allData'] = SchoolStudent::all();
    	return view('Admin_section.schools_view.view_students',$data);
    }

    
        
    public function ViewSchoolTransactions(){

		$data['allData'] = SchoolTransactions::all();
    	return view('Admin_section.transactions.view_transactions',$data);
    }










}
