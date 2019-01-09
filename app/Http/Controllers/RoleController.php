<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Permission;
use App\Role;

class RoleController extends Controller
{
    public function __construct() {

    }
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    $roles = Role::all();
    return view('admin.roles.index')->with(['roles'=>$roles]);
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
    $permissions = Permission::pluck('perName','id')->toArray();
    return view('admin.roles.create',compact('permissions'));
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request) {
    $this->validate($request,[
        'name'=>'required|unique:roles,deleted_at,NULL',
        'permissions'=>'required',
    ]);

    $role = Role::create(['name'=>$request->name]);
    $role->permissions()->attach($request->permissions);
    session()->flash('msg', 'Role added successfully.');
    return redirect()->route('admin.roles.index');
}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
//
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
    $role = Role::where(['id' => $id])->first();
    return $role->permissions;
    $permissions = Permission::pluck('perName','id')->toArray();
    return view('admin.roles.edit',compact('role','permissions'));
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
    $this->validate($request,[
        'name'=>'required|unique:roles',
    ]);

    $this->role->where(['id'=>$id])->update(['name'=>$request->name]);
    session()->flash('success_msg', 'Role updated successfully.');
    return redirect()->route('admin.roles.index');

}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
    $roles = $this->role->where(['id'=> $id])->delete();
    session()->flash('success_msg', 'Role deleted successfully.');
    return redirect()->route('admin.roles.index');
}
}
