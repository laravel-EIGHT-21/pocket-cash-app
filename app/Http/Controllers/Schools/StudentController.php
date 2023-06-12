<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    




    
    public function ViewStudents(){

        $id = Auth::user()->id;
        $type = Auth::user()->type;
        //$school = User::where('id',$id)->where('type',$type)->find($id);
        $school_code = Auth::user()->school_id_no;

  
          $data['allData'] = User::where('type',2)->where('school_std_code',$school_code)->where('status', 1)->get();
        return view('Schools_section.students_view.view_students',$data);
    }
  
  
  
        
    
    public function AddStudents(){
  
      //$data['allData'] = User::all();
        return view('Schools_section.students_view.add_student');
      }
  
  
      
        
    
    public function AddOldStudents(){
  
      $data['students'] = User::where('type',2)->get();
        return view('Schools_section.students_view.add_old_student',$data);
      }
  
  
  
  
  
      
    public function StoreStudents(Request $request){
  
  
  
        DB::transaction(function() use($request){
            $id = Auth::user()->id;
            $type = Auth::user()->type;
           
           $school = User::where('id',$id)->where('type',$type)->find($id);
         
      
          $student_acct = mt_rand(100000,999999);
  
            $final_id_no = $student_acct;
  
      
            $user = new User();
            $user->student_code = $final_id_no;
        $user->name = $request->name;
        $user->school_std_code = $school->school_id_no;
        $user->password = Hash::make($request->password);
        $user->type = 2;
         $user->save();
  
        
  
        });
  
  
        $notification = array(
          'message' => 'New Student Account Added Successfully',
          'alert-type' => 'success'
        );
  
        return redirect()->route('view.students')->with($notification);
  
  
  
  
  
      } // End Method 
  
    
    
    
    
    
        
      public function StoreOldStudents(Request $request){
  
          $acct_id = $request->acct_id;
          
  
          $check = User::where('student_code',$acct_id)->where('status',0)->where('type',2)->first();
  
  
                   
          if($check == true){
    
    
          DB::transaction(function() use($request){
            $id = Auth::user()->id;
            $type = Auth::user()->type;
           
           $students = User::where('id',$id)->where('type',$type)->find($id);
           
        
              $user = new User();
              $user->student_code = $request->acct_id;
          $user->name = $request->name;
          $user->school_std_code  = $students->school_id_no;
          $user->password = Hash::make($request->password);
          $user->type = 2;
           $user->save();
    
          
           User::where('student_code',$user->student_code)->where('status',0)->where('type',2)->delete();
           
    
          });
    
    
          $notification = array(
            'message' => 'Student Account Added Successfully',
            'alert-type' => 'success'
          );
    
          return redirect()->route('view.students')->with($notification);
    
        }
  
        else{
  
  
          $notification = array(
            'message' => 'STUDENT`S  ACCOUNT STILL ACTIVE IN ANOTHER SCHOOL...',
            'alert-type' => 'error'
          );
          
          return redirect()->back()->with($notification);
          
          }	
      
    
    
    
        } // End Method 
    
    
  
  
  
  
      
    
    public function EditStudents($id){
      $data['editData'] = User::findOrFail($id);
      
  
        return view('Schools_section.students_view.edit_student',$data);
  
      }
  
  
  
  
      
  
    
    public function UpdateStudents(Request $request, $id){
    
        DB::transaction(function() use($request,$id){
         
        $user = User::where('id',$id)->first();   
        $user->name = $request->name;
       
         $user->save();
  
  
  
        });
         
  
        $notification = array(
            'message' => 'Student Info Updated Successfully',
            'alert-type' => 'success'
        );
  
        return redirect()->route('view.students')->with($notification);
  
  
    }// END METHOD
  
  
  
    
    public function inactiveStudents($id)
  { 
  
    
  
    User::findOrFail($id)->update(['status' => 0]);
          $notification = array(
              'message' => 'Student Account Status Deactivated...',
              'alert-type' => 'error'
          );
          return redirect()->back()->with($notification);
  
  }
  
  
  public function activeStudents($id)
  {
    User::findOrFail($id)->update(['status' => 1]);
      $notification = array(
          'message' => 'Student Account Status Activated...',
          'alert-type' => 'success'
      );
      return redirect()->back()->with($notification);
  
  }
  
  






}
