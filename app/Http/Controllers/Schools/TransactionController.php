<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolTransactions;
use App\Models\loan;
use App\Models\withdrawal;
use App\Models\apiTransfers;
use App\Models\school_fees_collections;
use App\Models\students_pocketmoney;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class TransactionController extends Controller
{
    


    
    
    
    public function ViewStudentTransactions(){

     // $id = Auth::user()->id;
      $school_code = Auth::user()->school_id_no;
     

        $data['allData'] = User::where('type',2)->where('school_std_code',$school_code)->where('status',1)->get();
      return view('Schools_section.transactions.student_account_view',$data);
  }

 

  
  public function ViewStudentAccountDetails($id){

    $school_code = Auth::user()->school_id_no;


      
    $check = User::where('type',2)->where('uuid',$id)->where('school_std_code',$school_code)->where('status',1)->first();
  
    if($check == true){

    $account = User::where('type',2)->where('uuid',$id)->where('school_std_code',$school_code)->where('status',1)->get();

    $acct = students_pocketmoney::with(['student'])->select('uuid')->groupBY('uuid')->where('uuid',$id)->sum('amount');


    $withdrawal = withdrawal::with(['student'])->select('uuid')->groupBY('uuid')->where('uuid',$id)->sum('withdrawal_amount');

    
    $loans = loan::with(['student'])->select('uuid')->groupBY('uuid')->where('uuid',$id)->sum('loan_amount');


    $acct_bal = ((float)$acct-(float)$withdrawal)+(float)$loans; 

    $details = students_pocketmoney::with(['student'])->select('uuid')->groupBY('uuid')->where('uuid',$id)->where('school_id',$school_code)->get();

    
   $student_deposite = students_pocketmoney::where('uuid',$id)->latest()->get();
   $student_withdrawal = withdrawal::where('uuid',$id)->latest()->get();
   $student_loans = loan::where('uuid',$id)->latest()->get();


    return view('Schools_section.transactions.student_account_details', compact('account','acct','acct_bal','details','student_deposite','student_withdrawal','student_loans'));

  }
  
  else{

    return view('auth.403');
    
    }	



}







  
public function StudentWithdrawalForm($id){

  $allData = User::where('uuid',$id)->first();  

                
  $acct = students_pocketmoney::select('uuid')->groupBY('uuid')->where('uuid',$id)->sum('amount');

  
  $withdrawal = withdrawal::select('uuid')->groupBY('uuid')->where('uuid',$id)->sum('withdrawal_amount');
    
  $loans = loan::select('uuid')->groupBY('uuid')->where('uuid',$id)->sum('loan_amount');

  $acct_bal = ((float)$acct-(float)$withdrawal)+(float)$loans; 
 

  return view('Schools_section.transactions.withdrawal.student_account_withdrawal',compact('allData','acct_bal'));

}




  
public function StudentLoanForm($id){
   
  $allData = User::where('uuid',$id)->first();

        
  $acct = students_pocketmoney::select('uuid')->groupBY('uuid')->where('uuid',$id)->sum('amount');

  
  $withdrawal = withdrawal::select('uuid')->groupBY('uuid')->where('uuid',$id)->sum('withdrawal_amount');
    
  $loans = loan::select('uuid')->groupBY('uuid')->where('uuid',$id)->sum('loan_amount');


  $acct_bal = ((float)$acct-(float)$withdrawal)+(float)$loans; 
 
   return view('Schools_section.transactions.loans.student_account_loan',compact('allData','acct_bal'));
 
 }
 
 













///WITHDRAWALS SECTIONS ///


				
public function StudentWithdrawalAmountStore(Request $request,$id){

  $account = User::where('uuid',$id)->first();
  $uuid = $account->uuid;

  $acct = students_pocketmoney::select('uuid')->groupBY('uuid')->where('uuid',$id)->sum('amount');

  
  $withdrawal = withdrawal::with(['student'])->select('uuid')->groupBY('uuid')->where('uuid',$id)->sum('withdrawal_amount');
    
  $loans = loan::with(['student'])->select('uuid')->groupBY('uuid')->where('uuid',$id)->sum('loan_amount');


  $acct_bal = ((float)$acct-(float)$withdrawal)+(float)$loans; 
	
  if($request->withdrawal_amount <= $acct_bal)
  {


  $feesData = new withdrawal();
  $feesData->uuid = $id;
  $feesData->withdrawal_amount = $request->withdrawal_amount;
  $feesData->withdrawal_date = Carbon::now()->format('d F Y');
  $feesData->withdrawal_month = Carbon::now()->format('F Y');
  $feesData->withdrawal_year = Carbon::now()->format('Y');

  $feesData->save();

  $notification = array(
    'message' => 'Withdrawal Amount Submitted Successfully',
    'alert-type' => 'success'
);

return redirect()->route('view.student.account',$uuid)->with($notification);



		}

		else{

		$notification = array(
		'message' => 'Amount Entered is Greater than Account Balance...!',
		'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);


		}



}






public function StudentWithdrawnEdit($id){

  $withdrawals2 = withdrawal::findOrFail($id);


  return view('Schools_section.transactions.withdrawal.withdrawal_amount_edit',compact('withdrawals2'));

} 








  
public function StudentWithdrawnAmountUpdate(Request $request,$id){




  
    $feesData = withdrawal::where('id',$id)->find($id);

    $feesData->withdrawal_amount = $request->withdrawal_amount;		
    $feesData->save();
  
    $notification = array(
      'message' => 'Withdrawn Amount Updated Successfully',
      'alert-type' => 'success'
    );

    return redirect()->route('view.student.account',$feesData->uuid)->with($notification);


  


 
  }









  

      ///LOANS SECTIONS ///



      
public function StudentLoanAmountStore(Request $request,$id){

  
  $account = User::where('uuid',$id)->first();
  $uuid = $account->uuid;

  $feesData = new loan();
  $feesData->uuid = $id;
  $feesData->loan_amount = $request->loan_amount; 
  $feesData->loan_date = Carbon::now()->format('d F Y');
$feesData->loan_month = Carbon::now()->format('F Y');
$feesData->loan_year = Carbon::now()->format('Y');

  $feesData->save();

  $notification = array(
      'message' => 'Loan Given Successfully...',
      'alert-type' => 'success'
  );

  return redirect()->route('view.student.account',$uuid)->with($notification);

}






public function StudentLoanEdit($id){

  $loan2 = loan::findOrFail($id);


  return view('Schools_section.transactions.loans.loan_amount_edit',compact('loan2'));

} 








  
public function StudentLoanAmountUpdate(Request $request,$id){




  
    $feesData = loan::where('id',$id)->find($id);

    $feesData->loan_amount = $request->loan_amount;		
    $feesData->save();
  
    $notification = array(
      'message' => 'Loan Amount Updated Successfully',
      'alert-type' => 'success'
    );

    return redirect()->route('view.student.account',$feesData->uuid)->with($notification);


  


 
  }






  public function StudentLoanPaymentUpdate($id){

    $loan2 = loan::findOrFail($id);
  
  
    return view('Schools_section.transactions.loans.student_account_loan_payment',compact('loan2'));
  
  } 
  



  
  public function StudentLoanPaymentAmountUpdate(Request $request,$id){

				
		$loan_payment_amount = $request->loan_payment_amount;
		$loan_payment_date = Carbon::now()->format('d F Y');
		$loan_payment_month = Carbon::now()->format('F Y');
		$loan_payment_year = Carbon::now()->format('Y');


	
	$check = loan::where('id',$id)->where('loan_payment_amount', $loan_payment_amount)->where('loan_payment_date', $loan_payment_date)->where('loan_payment_month', $loan_payment_month)->where('loan_payment_year', $loan_payment_year)->first();

	if($check == null){


		
			$feesData = loan::where('id',$id)->find($id);

			$feesData->loan_payment_amount = $request->loan_payment_amount;		
			$feesData->loan_payment_date = Carbon::now()->format('d F Y');
			$feesData->loan_payment_month = Carbon::now()->format('F Y');
			$feesData->loan_payment_year = Carbon::now()->format('Y');
		
			$feesData->save();
		
			$notification = array(
				'message' => 'Loan Payment Amount Submitted Successfully',
				'alert-type' => 'success'
			);

      return redirect()->route('view.student.account',$feesData->uuid)->with($notification);


		}


		else{
		
			$notification = array(
			  'message' => 'LOAN PAYMENT ALREADY MADE !!!',
			  'alert-type' => 'error'
			);
		  
			return redirect()->back()->with($notification);
		  
		  }

	 
		}














}
