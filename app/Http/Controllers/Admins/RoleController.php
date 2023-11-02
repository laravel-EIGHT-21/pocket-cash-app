<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{



    function __construct()
  
    {

         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);

         $this->middleware('permission:role-create', ['only' => ['create','store']]);

         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:role-delete', ['only' => ['destroy']]);

    }
    

    public function index()

    {

        $roles = Role::all();
        return view('Admin_section.roles.index',compact('roles'));

    }


    public function create()

    {

        $permissions = Permission::all();

        return view('Admin_section.roles.create',compact('permissions'));

    }


    public function store(Request $request)

    {

        $this->validate($request, [

            'name' => 'required|unique:roles,name',

            'permission' => 'required',

        ]);

    

        $role = Role::create(['name' => $request->input('name')]);

        $role->syncPermissions($request->input('permission'));

    

        return redirect()->route('roles.view')->with('success','Role Created Successfully');

    }


    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = $role->permissions;
    
        return view('Admin_section.roles.show',compact('role','rolePermissions'));
    }



public function edit($id)

{

$role = Role::find($id);

$rolePermissions = $role->permissions->pluck('name')->toArray();

$permissions = Permission::get();

return view('Admin_section.roles.edit',compact('role','permissions','rolePermissions'));

}



public function update(Request $request, $id)

{

    $this->validate($request, [

        'name' => 'required',

        'permission' => 'required',

    ]);



    $role = Role::find($id);

    $role->name = $request->input('name');

    $role->save();

    $role->syncPermissions($request->input('permission'));

    return redirect()->route('roles.view')->with('success','Role Updated Successfully');

}


public function destroy($id)

{


    Role::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Role Info Deleted Successfully',
        'alert-type' => 'error'
    );

    return redirect()->route('roles.view')->with($notification);



}




}
