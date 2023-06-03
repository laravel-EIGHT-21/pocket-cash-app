<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{



    function __construct()

    {

         $this->middleware('permission:view-admin-users|create-admin-user|edit-admin-user', ['only' => ['ViewAdminUsers']]);

         $this->middleware('permission:create-admin-user', ['only' => ['AddAdminUser','StoreAdminUser']]);

         $this->middleware('permission:edit-admin-user', ['only' => ['EditAdminUser','UpdateAdminUser']]);

        // $this->middleware('permission:role-delete', ['only' => ['destroy']]);

    }
    


    public function destroy(Request $request): RedirectResponse
    {

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return redirect()->route('login');

    }



    
    public function profileAdmin()
    {
        $id = Auth::user()->id;
		$adminData = User::find($id);
        return view('admin.admin_profile',compact('adminData'));
   
    }

    public function profileEdit()
    {
        $id = Auth::user()->id;
		$editData = User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));

    }

    public function profileUpdate(Request $request)
    {
        $id = Auth::user()->id;
		$updateData = User::find($id);
        $updateData->name = $request->name;
        $updateData->email = $request->email;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$updateData->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $updateData['profile_photo_path'] = $filename;
        }
        $updateData->save();

        $notification = array(
            'message' => 'Profile Info Updated Successfully...',
            'alert-type' => 'success'
        );

        return redirect()->route('profile.view')->with($notification);

    }

    public function changePass()
    {

        $id = Auth::user()->id;
		$passData = User::find($id);
        return view('admin.admin_password_edit',compact('passData'));

    }

    public function passUpdate(Request $request)
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
            return redirect()->route('admin.logout');

        }else{
            return redirect()->back();
        }

    }







    
    public function ViewAdminUsers(){

		$data['allData'] = User::all();
    	return view('Admin_section.admins_view.view_admin',$data);
    }


    
    
    public function AddAdminUser(){

		$data['roles'] = Role::all();
    	return view('Admin_section.admins_view.add_admin',$data);
    }





    public function StoreAdminUser(Request $request){


		$email = $request->email;		
		$check = User::where('email',$email)->first();

		if($check == null){


    	DB::transaction(function() use($request){
    	
			$adminuser = new User(); 
			$adminuser->name = $request->name;
			$adminuser->email = $request->email;
			$adminuser->mobile = $request->mobile;
			$adminuser->password = Hash::make($request->password);
			$adminuser->created_at = Carbon::now(); 
			$adminuser->save();

            $roles = $request['roles'];

			if (isset($roles)) {
	
				foreach ($roles as $role) {
				$role_r = Role::where('id', '=', $role)->firstOrFail();            
				$adminuser->assignRole($role_r);
				}
			}     

           
    	});


    	$notification = array(
    		'message' => 'New Admin Info Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('view.admin.user')->with($notification);

	}

		else{


			$notification = array(
			  'message' => 'USER EMAIL ALREADY EXIST!!!',
			  'alert-type' => 'error'
			);
		  
			return redirect()->back()->with($notification);
		  
		  }	
	


    } // END Method








    
    public function EditAdminUser($id){
		$data['editData'] = User::findOrFail($id);

        $data['editRole'] = DB::table('model_has_roles')->where('model_id',$id)->orderBy('role_id','asc')->get();
        $data['roles'] = Role::all();
		
    	return view('Admin_section.admins_view.edit_admin',$data);

    }





    
    public function UpdateAdminUser(Request $request, $id){
    
    	DB::transaction(function() use($request,$id){
    	 
    	$adminuser = User::where('id',$id)->first();    	 
		$adminuser->name = $request->name;
		$adminuser->email = $request->email;
		$adminuser->mobile = $request->mobile;
		$adminuser->password = Hash::make($request->password);
	
 	    $adminuser->save();


         $roles = $request['roles'];
		 if (isset($roles)) {        
            $adminuser->roles()->sync($roles);            
        }        
        else {
            $adminuser->roles()->detach();
        }



    	});
         

    	$notification = array(
    		'message' => 'Admin Info Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('view.admin.user')->with($notification);


    }// END METHOD









}
