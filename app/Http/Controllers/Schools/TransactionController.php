<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolStudent;
use App\Models\SchoolTransactions;
use App\Models\loan;
use App\Models\withdrawal;
use App\Models\apiTransfers;
use App\Models\Schools;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionController extends Controller
{
    


    
    
    
    public function ViewStudentTransactions(){

      $id = Auth::user()->id;
     

        $data['allData'] = SchoolStudent::with(['school'])->where('school_id',$id)->where('status',1)->get();
      return view('Schools_section.transactions.student_account_view',$data);
  }



  
  public function ViewStudentAccountDetails($acct_id){

    $account = SchoolStudent::where('acct_id',$acct_id)->get();

    $acct = apiTransfers::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_id)->sum('amount');


    $withdrawal = withdrawal::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_id)->sum('withdrawal_amount');

    
    $loans = loan::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_id)->sum('loan_amount');


    $acct_bal = ((float)$acct-(float)$withdrawal)+(float)$loans; 

    $details = apiTransfers::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_id)->get();

    
   $student_deposite = apiTransfers::where('student_acct_no',$acct_id)->get();
   $student_withdrawal = withdrawal::where('student_acct_no',$acct_id)->get();
   $student_loans = loan::where('student_acct_no',$acct_id)->get();


    return view('Schools_section.transactions.student_account_details', compact('account','acct','acct_bal','details','student_deposite','student_withdrawal','student_loans'));

}







  
public function StudentWithdrawalForm($id){

  $allData = SchoolStudent::where('id',$id)->first();
  $acct_no = $allData->acct_id;

        
  $acct = apiTransfers::select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_no)->sum('amount');

  
  $withdrawal = withdrawal::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_no)->sum('withdrawal_amount');
    
  $loans = loan::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_no)->sum('loan_amount');


  $acct_bal = ((float)$acct-(float)$withdrawal)+(float)$loans; 
 

  return view('Schools_section.transactions.withdrawal.student_account_withdrawal',compact('allData','acct_bal'));

}




  
public function StudentLoanForm($id){
   
  $allData = SchoolStudent::where('id',$id)->first();

  $acct_no = $allData->acct_id;

        
  $acct = apiTransfers::select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_no)->sum('amount');

  
  $withdrawal = withdrawal::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_no)->sum('withdrawal_amount');

    
  $loans = loan::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_no)->sum('loan_amount');


  $acct_bal = ((float)$acct-(float)$withdrawal)+(float)$loans; 
 
   return view('Schools_section.transactions.loans.student_account_loan',compact('allData','acct_bal'));
 
 }
 
 













///WITHDRAWALS SECTIONS ///


				
public function StudentWithdrawalAmountStore(Request $request,$id){

  $account = SchoolStudent::where('id',$id)->find($id);
  $acct_no = $account->acct_id;
    
  $acct = apiTransfers::select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_no)->sum('amount');

  
  $withdrawal = withdrawal::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_no)->sum('withdrawal_amount');

    
  $loans = loan::with(['student'])->select('student_acct_no')->groupBY('student_acct_no')->where('student_acct_no',$acct_no)->sum('loan_amount');


  $acct_bal = ((float)$acct-(float)$withdrawal)+(float)$loans; 
	
  if($request->withdrawal_amount <= $acct_bal)
  {


  $feesData = new withdrawal();
  $feesData->student_id = $id;
  $feesData->student_acct_no  = $acct_no;

  $feesData->withdrawal_amount = $request->withdrawal_amount;
  $feesData->withdrawal_date = Carbon::now()->format('d F Y');
  $feesData->withdrawal_month = Carbon::now()->format('F Y');
  $feesData->withdrawal_year = Carbon::now()->format('Y');

  $feesData->save();

  $notification = array(
    'message' => 'Withdrawal Amount Submitted Successfully',
    'alert-type' => 'success'
);

return redirect()->route('view.student.account',$feesData->student_acct_no)->with($notification);



		}

		else{

		$notification = array(
		'message' => 'Withdrawal Amount Entered is Greater than Account Balance...!',
		'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);


		}



}






public function StudentWithdrawnEdit($id){

  $withdrawals2 = withdrawal::with(['student'])->findOrFail($id);


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

    return redirect()->route('view.student.account',$feesData->student_acct_no)->with($notification);


  


 
  }








/*
  public function StudentWithdrawalAmountDelete($id)
  {
  
    $fees = withdrawal::find($id);
    $withdrawal = $fees->withdrawal_amount;
    $invoice = $fees->student_id;
    
    $acct_amount = SchoolStudent::where('id',$invoice)->first();
    $amount = $acct_amount->actual_amount;
    $new_amount = (float)$amount+(float)$withdrawal;

    SchoolStudent::where('id',$invoice)->where('actual_amount',$amount )->update([

      'actual_amount' => $new_amount,

    ]);


    withdrawal::find($id)->delete();
   
    $notification = array(
      'message' => 'Withdrawal Amount has been DELETED Successfully...',
      'alert-type' => 'error'
    );
    return redirect()->back()->with($notification);

  
  }


*/






  

      ///LOANS SECTIONS ///



      
public function StudentLoanAmountStore(Request $request,$id){

  
  $account = SchoolStudent::where('id',$id)->find($id);
  $acct_no = $account->acct_id;
    

  $feesData = new loan();
  $feesData->student_id = $id;
  $feesData->student_acct_no  = $acct_no;
 
  $feesData->loan_amount = $request->loan_amount; 
  $feesData->loan_date = Carbon::now()->format('d F Y');
$feesData->loan_month = Carbon::now()->format('F Y');
$feesData->loan_year = Carbon::now()->format('Y');

  $feesData->save();

  $notification = array(
      'message' => 'Loan Given Successfully...',
      'alert-type' => 'success'
  );

  return redirect()->route('view.student.account',$feesData->student_acct_no)->with($notification);

}



/*
  public function StudentLoanAmountDelete($id)
  {
  
    $fees = loan::find($id);
    $loans = $fees->loan_amount;
    $invoice = $fees->account_id;
    
    $acct_amount = SchoolTransactions::where('id',$invoice)->first();
    $amount = $acct_amount->acct_amount;
    $new_amount = (float)$amount-(float)$loans;
    

    SchoolTransactions::where('id',$invoice)->where('acct_amount',$amount )->update([

      'acct_amount' => $new_amount,

    ]);


    loan::find($id)->delete();
   
    $notification = array(
      'message' => 'Loan Amount has been DELETED Successfully...',
      'alert-type' => 'error'
    );
    return redirect()->back()->with($notification);

  
  }

*/





public function StudentLoanEdit($id){

  $loan2 = loan::with(['student'])->findOrFail($id);


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

    return redirect()->route('view.student.account',$feesData->student_acct_no)->with($notification);


  


 
  }






  public function StudentLoanPaymentUpdate($id){

    $loan2 = loan::with(['student'])->findOrFail($id);
  
  
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

      return redirect()->route('view.student.account',$feesData->student_acct_no)->with($notification);


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
