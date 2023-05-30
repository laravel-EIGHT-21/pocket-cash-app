<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schools;
use App\Models\SchoolStudent;
use App\Models\studentCodes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    


    
    
    
    public function ViewStudents(){

      $id = Auth::user()->id;
      $school = Schools::where('id',$id)->find($id);
     // $code =$school->school_id_no;

        $data['allData'] = SchoolStudent::with(['school'])->where('school_id',$id)->get();
      return view('Schools_section.students_view.view_students',$data);
  }



      
  
  public function AddStudents(){

    //$data['allData'] = User::all();
      return view('Schools_section.students_view.add_student');
    }


    
      
  
  public function AddOldStudents(){

    $data['students'] = SchoolStudent::all();
      return view('Schools_section.students_view.add_old_student',$data);
    }





    
  public function StoreStudents(Request $request){



      DB::transaction(function() use($request){
        $id = Auth::user()->id;
       
        $students = Schools::where('id',$id)->find($id);
       
    
        $student_acct = mt_rand(100000,999999);

          $final_id_no = $student_acct;

    
          $user = new SchoolStudent();
          $user->acct_id = $final_id_no;
      $user->name = $request->name;
      $user->school_id = $students->school_id_no;
       $user->save();

      

      });


      $notification = array(
        'message' => 'New Student Account Added Successfully',
        'alert-type' => 'success'
      );

      return redirect()->route('view.students')->with($notification);





    } // End Method 




		
		public function GetStudentCode(Request $request){

			$id = $request->id;
			

            $allData = SchoolStudent::where('status',1)->where('id',$id)->first()->acct_id;
            return response()->json($allData); 
	
		}
  
  
  
  
  
      
    public function StoreOldStudents(Request $request){

		$acct_id = $request->acct_id;
		

		$check = SchoolStudent::where('acct_id',$acct_id)->where('status',0)->first();


			     
		if($check == true){
  
  
        DB::transaction(function() use($request){
          $id = Auth::user()->id;
         
         $students = Schools::where('id',$id)->find($id);
         
      
            $user = new SchoolStudent();
            $user->acct_id = $request->acct_id;
        $user->name = $request->name;
        $user->school_id = $students->school_id_no;
         $user->save();
  
        
         SchoolStudent::where('acct_id',$user->acct_id)->where('status',0)->delete();
         
  
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
    $data['editData'] = SchoolStudent::findOrFail($id);
    

      return view('Schools_section.students_view.edit_student',$data);

    }




    

  
  public function UpdateStudents(Request $request, $id){
  
      DB::transaction(function() use($request,$id){
       
      $user = SchoolStudent::where('id',$id)->first();   
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

  

  SchoolStudent::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Student Account Status Deactivated...',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

}


public function activeStudents($id)
{
  SchoolStudent::findOrFail($id)->update(['status' => 1]);
    $notification = array(
        'message' => 'Student Account Status Activated...',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);

}












}
