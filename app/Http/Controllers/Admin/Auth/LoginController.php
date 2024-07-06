<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [
                'email' => ['required', 'string', 'email',],
                'password' => ['required', 'string',],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->only('email'));
            } else {
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                    session()->flash('success', 'user created successfully!');
                    return redirect()->route('admin.dashboard');
                } else {
                    session()->flash('error', 'Email or password is incorrect');
                    return redirect()->back();
                }
                // return redirect()->route('user.login')->with('message', 'User created successfully!');
            }
        }

        return view('admin.auth.login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'you are successfully logout!');
   
    }
}
