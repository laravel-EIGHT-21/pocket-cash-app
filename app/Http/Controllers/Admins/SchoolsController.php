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
use Illuminate\Support\Facades\Http;
use App\Models\questions;

class SchoolsController extends Controller
{
    
/*

public function ViewQuestions(){

  $data['allData'] = questions::all();
  return view('Admin_section.admin_view.questions_api',$data);
}
*/





  public function ViewQuestions()
    {
        $response = Http::get('https://quizapi.io/api/v1/questions', [
            'apiKey' => 'anPs9BgDdDx0CnV0wQQeXks5UBHrSZVk3SRYm5KR',
            'limit' => 10,
        ]);
        $quizzes = json_decode($response->body());
        foreach($quizzes as $quiz){
                $question = new questions;
                $question->question = $quiz->question;
                $question->answer_a = $quiz->answers->answer_a;
                $question->answer_b = $quiz->answers->answer_b;
                $question->answer_c = $quiz->answers->answer_c;
                $question->answer_d = $quiz->answers->answer_d;
                $question->save();
        }
        $data['allData'] = questions::all();
  return view('Admin_section.admins_view.questions_api',$data);

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
