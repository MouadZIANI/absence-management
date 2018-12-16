<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class TeacherLoginController extends Controller
{
	function __construct()
	{
		$this->middleware('guest:teacher',['except'=>['logout']]);
	}
    public function showLoginForm()
    {
    	return view('auth.teacher-login');
    }

    public function login(Request $request)
    {
    	// validate form data
    	$this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        // attempt to log the user in
    	if(Auth::guard('teacher')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect()->intended(route('teacher'));
        }
        // if unsuccessful, then redirect to the login with the form data
        return redirect()->back()->withInput($request->only(['email','remember']));
    }

    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect('/');
    }
}
