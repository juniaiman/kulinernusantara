<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login()
    {
        return view("login", [
            'title' => 'FYP',
            'active' => 'Login'
        ]);
    }

    public function lupapassword(){
        return view('lupapassword');
    }

    public function lupapasswordact(Request $request)
        {
            $validate = $request->validate([
                'email'=> 'required|email|exists:users,email'
            ]);

            $token = Str::random(5);

            PasswordResetToken::updateOrCreate(
            [
                'email'=> $request->email
            ], 

            [
                'email'=> $request->email,
                'token' => $token,
                'created_at'=> now(),
            ]);

            Mail::to($request->email)->send(new ResetPasswordMail($token));

            return redirect()->route('lupapassword')->with('success',"We've sent a password reset token to your email");
        }

    public function validasipassword(Request $request, $token){

        $getToken = PasswordResetToken::where('token', $token)->first();

        if (!$getToken) {
            return redirect()->route('login')->with('failed','Invalid token');
        }

        $token = $getToken->token;

        return view('validasitoken', compact('token'));
    }

    public function validasipasswordact(Request $request){

        $token = PasswordResetToken::where('token', $request->token)->first();

        if (!$token) {
            return redirect()->route('login')->with('failed','Invalid Token');
        }

        $user = User::where('email', $token->email)->first();


        if (!$user) {
            return redirect()->route('login')->with('failed','Email not registered');
        }

        $user->update([
            'password' => Bcrypt($request->password)
        ]);

        // $user->save();

        $token->delete();

        return redirect()->route('login')->with('success','Your password has been changed');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(){
        Auth::logout();
        session()->flush();
        return redirect('/');
    }
}

