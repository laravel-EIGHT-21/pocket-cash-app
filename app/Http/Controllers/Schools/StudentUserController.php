<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use App\Models\student_files;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\loan;
use App\Models\withdrawal;
use App\Models\apiTransfers;

class StudentUserController extends Controller
{
    


    
    
    public function studentindex(){


    	return view('students.index');
    }









    public function destroy(Request $request): RedirectResponse
    {

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }





    
    public function StudentUserprofile()
    {
        $id = Auth::user()->id;
		$adminData = User::find($id);
        return view('students.student_profile',compact('adminData'));
   
    }




    
    public function profilephotoUpdate(Request $request)
    {
        $id = Auth::user()->id;
		$updateData = User::find($id);

        if($request->file('student_profile_path')){
            $file = $request->file('student_profile_path');
            @unlink(public_path('upload/student_images/'.$updateData->student_profile_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/student_images'),$filename);
            $updateData['student_profile_path'] = $filename;
        }
        $updateData->save();

        $notification = array(
            'message' => 'Profile Photo Updated Successfully...',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    

    public function studentpassUpdate(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]); 

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $admin = User::find(Auth::id());
            $admin->password= Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('student.logout'); 

        }else{
            return redirect()->back();
        }

    }




    public function ViewFiles(){

        $id = Auth::user()->id;

        $data['allData'] = student_files::where('student_id',$id)->latest()->get();

        return view('students.student_dash.view_student_file',$data);
    }



    
    public function AddFile(){

        return view('students.student_dash.add_student_file');
    }


        
    public function StoreFile(Request $request){

            
  DB::transaction(function() use($request){

    $id = Auth::user()->id;
    $code= Auth::user()->student_code;


    $validatedData = $request->validate([

        'docs' => 'required|mimes:csv,txt,xlx,xls,pdf|max:4096',

       ]);


    $fileName = time().'.'.$request->docs->extension();  
    $request->docs->move(public_path('upload/student_files'), $fileName);
    $save_file =  'upload/student_files/'.$fileName;



    $user = new student_files();
$user->student_id = $id;
$user->student_acct_no = $code;
$user->title = $request->title;
$user->file_type = $request->file_type;
$user->date = Carbon::now()->format('d F y');
$user->month = Carbon::now()->format('F y');
$user->year = Carbon::now()->format('y');
$user->docs = $save_file;


$user->save();

           


});

        
        $notification = array(
            'message' => 'File Infor Saved Successfully',
            'alert-type' => 'success'
          );
        
          return redirect()->route('view.files')->with($notification);
        


        
    }



    
    public function EditFile($id){

        $data['editData'] = student_files::findOrFail($id);

        return view('students.student_dash.edit_student_file', $data);
    }




            // Student Admissions Details 
	public function FileDetails($id){ 

        $student_docs = student_files::with(['student'])->where('id',$id)->first();
          return view('students.student_dash.file_details',compact('student_docs'));

 } // end method 


        
    public function UpdateFile(Request $request, $id){

   
            $user1 = student_files::findOrFail($id);   
            $user1->title = $request->title;
            $user1->file_type = $request->file_type;
             $oldfile = $user1->docs;
            //unlink($oldfile);

            if($request->file('docs')){  
            unlink($oldfile);        
            $file = $request->file('docs'); 
            $fileName = time().'.'.$file->extension();  
            $file->move(public_path('upload/student_files'), $fileName);
            $user1['docs'] = 'upload/student_files/'.$fileName;
            }
           
             $user1->save();         
                       
          
            $notification = array(
                'message' => 'File Infor Updated Successfully',
                'alert-type' => 'success'
              );
            
              return redirect()->route('view.files')->with($notification);
          
    }





    

  public function DeleteFile($id)
  {


    $news = student_files::findOrFail($id);
    $image_path = $news->docs;

    if (student_files::exists($image_path)) {
        //File::delete($image_path);
        unlink($image_path);
    }
    $news->delete();


      $notification = array(
        'message' => 'File Infor DELETED Successfully...',
        'alert-type' => 'error'
    );
      return redirect()->back()->with($notification);

  }


    
  public function ViewAccountDetails($student_code){

    $account = User::where('type',2)->where('id',$student_code)->where('status',1)->get();

    $acct = apiTransfers::with(['student'])->select('student_id')->groupBY('student_id')->where('student_id',$student_code)->sum('amount');


    $withdrawal = withdrawal::with(['student'])->select('student_id')->groupBY('student_id')->where('student_id',$student_code)->sum('withdrawal_amount');

    
    $loans = loan::with(['student'])->select('student_id')->groupBY('student_id')->where('student_id',$student_code)->sum('loan_amount');


    $acct_bal = ((float)$acct-(float)$withdrawal)+(float)$loans; 

    $details = apiTransfers::with(['student'])->select('student_id')->groupBY('student_id')->where('student_id',$student_code)->get();

    
   $student_deposite = apiTransfers::where('student_id',$student_code)->latest()->get();
   $student_withdrawal = withdrawal::where('student_id',$student_code)->latest()->get();
   $student_loans = loan::where('student_id',$student_code)->latest()->get();


    return view('students.student_dash.student_account_details', compact('account','acct','acct_bal','details','student_deposite','student_withdrawal','student_loans'));

}






}
