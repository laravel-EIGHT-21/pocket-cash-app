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
use Ramsey\Uuid\Uuid;

class SchoolUsersController extends Controller
{
    


    public function destroy(Request $request): RedirectResponse
    {

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }




        
    public function schoolindex(){


    	return view('schools.index');
    }






    public function SchoolUserprofile()
    {
        $id = Auth::user()->id;
		$adminData = User::find($id);
        return view('schools.school_profile',compact('adminData'));
   
    }




    

    public function schoolpassUpdate(Request $request)
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
            return redirect()->route('school.logout'); 

        }else{
            return redirect()->back();
        }

    }



}
