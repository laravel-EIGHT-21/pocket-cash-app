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
use Ramsey\Uuid\Uuid;

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

        $id = Auth::user()->uuid;

        $data['allData'] = student_files::where('uuid',$id)->latest()->get();

        return view('students.student_dash.view_student_file',$data);
    }



    
    public function AddFile(){

        return view('students.student_dash.add_student_file');
    }


        
    public function StoreFile(Request $request){

            
  DB::transaction(function() use($request){

    $id = Auth::user()->uuid;
    $code= Auth::user()->student_code;


    $validatedData = $request->validate([

        'docs' => 'required|mimes:csv,txt,xlx,xls,pdf|max:4096',

       ]);


       $file = $request->file('docs');
 
    $fileName = $file->hashName().'.'.$file->extension();  
    $file->move(public_path('upload/student_files'), $fileName);
    $save_file = $fileName;



    $user = new student_files();
$user->uuid = $id;
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



        $uuid = Auth::user()->uuid;

        $student = student_files::with(['student'])->where('uuid',$uuid)->where('id',$id)->first();

        if($student == true){

            $data['editData'] = student_files::where('uuid',$uuid)->findOrFail($id);

            return view('students.student_dash.edit_student_file', $data);
            

        }

        else{
            return view('auth.403');
        }

    }


    



            // Student Admissions Details 
	public function FileDetails($id){ 

        $uuid = Auth::user()->uuid;

        $student = student_files::with(['student'])->where('uuid',$uuid)->where('id',$id)->first();

        if($student == true){

            
            $student_docs = student_files::with(['student'])->where('uuid',$uuid)->where('id',$id)->findOrFail($id);

            return view('students.student_dash.file_details',compact('student_docs'));

            

        }

        else{
            return view('auth.403');
        }



 } // end method 


        
    public function UpdateFile(Request $request, $id){

   
            $user1 = student_files::findOrFail($id);   
            $user1->title = $request->title;
            $user1->file_type = $request->file_type;
             $oldfile = $user1->docs;

             $old_doc = $request->old_doc;

            if($request->file('docs')){  
             @unlink(public_path('upload/student_files/'.$oldfile));      
            $file = $request->file('docs'); 
            $fileName = $file->hashName().'.'.$file->extension();  
            $file->move(public_path('upload/student_files'), $fileName);
            $user1['docs'] = $fileName;
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


    
  public function ViewAccountDetails($student_id){

    $auth = Auth::user()->uuid;

      
    $check = User::where('type',2)->where('uuid',$student_id)->where('uuid',$auth)->where('status',1)->first();
  
    if($check == true){


    $account = User::where('type',2)->where('uuid',$student_id)->where('uuid',$auth)->where('status',1)->get();

    $acct = apiTransfers::with(['student'])->select('uuid')->groupBY('uuid')->where('uuid',$student_id)->where('uuid',$auth)->sum('amount');


    $withdrawal = withdrawal::with(['student'])->select('uuid')->groupBY('uuid')->where('uuid',$student_id)->where('uuid',$auth)->sum('withdrawal_amount');

    
    $loans = loan::with(['student'])->select('uuid')->groupBY('uuid')->where('uuid',$student_id)->where('uuid',$auth)->sum('loan_amount');


    $acct_bal = ((float)$acct-(float)$withdrawal)+(float)$loans; 

    $details = apiTransfers::with(['student'])->select('uuid')->groupBY('uuid')->where('uuid',$student_id)->where('uuid',$auth)->get();

     
   $student_deposite = apiTransfers::where('uuid',$student_id)->where('uuid',$auth)->latest()->get();
   $student_withdrawal = withdrawal::where('uuid',$student_id)->where('uuid',$auth)->latest()->get();
   $student_loans = loan::where('uuid',$student_id)->where('uuid',$auth)->latest()->get();


    return view('students.student_dash.student_account_details', compact('account','acct','acct_bal','details','student_deposite','student_withdrawal','student_loans'));

}
  
else{

    return view('auth.403');
  
  }	




}






}
