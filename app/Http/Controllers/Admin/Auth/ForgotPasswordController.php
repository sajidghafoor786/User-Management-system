<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function forgetPassword(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'email' => 'required|email|exists:users,email',
            ]);

        //    if already reset password send link 
        $alreadySendEmail =   DB::table('password_reset_tokens')->where(['email' => $request->email])->get();
        
        if($alreadySendEmail){
            return back()->with('error', 'Already send reset password link on your Email!');
        }
            $token = Str::random(64);

            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);

            Mail::send('admin.auth.email.forget-password-email', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password Notification');
            });

            return back()->with('success', 'We have e-mailed your password reset link!');
        }
        // else part here 
        return view('admin.auth.forget-password');
    }
}
