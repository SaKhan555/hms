<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
	public function user() 
	{
		$users = User::latest()->get();
		$last_updated = $users->first()->updated_at->format("d-m-Y h:i a");
		return view('admin.user.user',compact('users','last_updated'));
	}

	public function add_user() 
	{
		return view('admin.user.add_user');
	}

	public function store_user(Request $request)
	{
		$this->validate(request(),[
			'name' => 'required|min:3|max:20',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|confirmed|min:3'
		]);
		$request->merge(['password'=>bcrypt($request)]);
		$user = User::create($request->all());
		if($user){
			session()->flash('success_msg', 'User '.$request->name.' added successfully.');
			return redirect('/admin/user/user');
		}else{
			session()->flash('failure_msg', 'User '.$request->name.' Failed to add.');
		}
	}

	public function edit_user(User $user) 
	{
		abort(404);
		return view('admin.user.user_user',compact('user'));
	}

	public function user_details(User $user) 
	{
		return view('admin.user.user_details',compact('user'));
	}
}
