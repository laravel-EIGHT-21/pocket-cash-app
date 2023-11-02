<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    

    function __construct()

    {

         $this->middleware('permission:permit-list|permit-create|permit-edit|permit-delete', ['only' => ['index','store']]);

         $this->middleware('permission:permit-create', ['only' => ['create','store']]);

         $this->middleware('permission:permit-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:permit-delete', ['only' => ['destroy']]);

    }



    
    public function index()
    {   
        $permits = Permission::all();

        return view('Admin_section.permissions.index',compact('permits'));
    }

/*
    public function create() 
    {   
        return view('backend.permissions.create');
    }

    */


    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|unique:permissions,name'
        ]);

        Permission::create($request->only('name'));

        $notification = array(
            'message' => 'Permission Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('permissions.view')->with($notification);
    }



    public function edit( $id)
    {
        $permit = Permission::find($id);
        return view('Admin_section.permissions.edit',compact ('permit'));
    }



    public function update(Request $request, $id)
    {
        $data = Permission::find($id);
     
        $validatedData = $request->validate([
               'name' => 'required|unique:permissions,name,'.$data->id
               
           ]);
   
           
           $data->name = $request->name;
           $data->save();
   
           $notification = array(
               'message' => 'Permission Updated Successfully',
               'alert-type' => 'success'
           );
   
           return redirect()->route('permissions.view')->with($notification);
    }



    public function destroy($id)
    {

        Permission::findOrFail($id)->delete();

        $notification = array(
    		'message' => 'Permission Info Deleted Successfully',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('permissions.view')->with($notification);

        
    }






}
