<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class RedirectController extends Controller
{

    public function index(){

        $type = Auth::user()->type;

        if($type == 0)
        {

            return view('admin.index');
        }


        if($type == 1)
        {
             return view('schools.index');
        }


        if($type == 2)
        {
            return view('students.index');
        }
        
        
        else{
            return redirect()->route('login');
        }

    }
    
}
