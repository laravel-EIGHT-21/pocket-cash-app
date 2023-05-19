<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schools; 
use App\Models\SchoolStudent;
use App\Models\SchoolTransactions;
use App\Models\loan;
use App\Models\withdrawal;
use App\Models\apiTransfers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ParentController extends Controller
{



    
    public function StudentAccountView(){
		
    	return view('parents.get_account');

    }






    
	
    public function StudentAccountGet(Request $request){
 
		$acct_id = $request->acct_id;
		
		
		$singleStudent = SchoolStudent::where('acct_id',$acct_id)->where('status',1)->first();

		if ($singleStudent == true) {
		
			// O-LEVEL STUDENTS //
		
			$account = SchoolStudent::where('acct_id',$acct_id)->get();


            
    $acct = apiTransfers::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_id)->sum('amount');


    $withdrawal = withdrawal::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_id)->sum('withdrawal_amount');

    
    $loans = loan::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_id)->sum('loan_amount');


    $acct_bal = ((float)$acct-(float)$withdrawal)+(float)$loans; 

    $details = apiTransfers::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_id)->get();

    
   $student_deposite = apiTransfers::where('student_acct_no',$acct_id)->get();
   $student_withdrawal = withdrawal::where('student_acct_no',$acct_id)->get();
   $student_loans = loan::where('student_acct_no',$acct_id)->get();

		
		
		 return view('parents.view_account',compact('account','acct','acct_bal','details','student_deposite','student_withdrawal','student_loans'));
		
			}
		
			
			else{ 
		
				$notification = array(
					'message' => 'NO MATCH FOR STUDENT ACCOUNT...',
					'alert-type' => 'error'
				);
		
				return redirect()->back()->with($notification);
		
				  }
				
		
		
		
			} // end Method 







    
}
