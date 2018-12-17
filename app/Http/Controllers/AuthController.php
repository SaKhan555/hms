<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller {

    public function authentication_form() {
        return view('admin.authentication.authentication_form');
    }

    public function authenticate(Request $request) {

        $request->validate([
            'email' => 'required|min:3',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
// Authentication passed...
            return redirect()->home();
        }else{
            return back()->withErrors([
                'meassage'=>' Please check your credentials.'
            ]);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/admin/authentication/authentication_form');
    }
}
