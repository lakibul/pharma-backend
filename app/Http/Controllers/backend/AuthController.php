<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\CustomVerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function loginForm()
    {
        return view('backend.auth.login');

    }

    public function login(Request $request)
    {
        if (Auth::guard()->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegistrationForm()
    {
        return view('backend.auth.register');
    }

    public function register(Request $request)
    {
        // Validate the incoming request
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);

        // Send a custom verification email
        Mail::to($user->email)->send(new CustomVerifyEmail($user));

        // Redirect to a page saying email has been sent for verification
        return redirect()->route('email-verification.notice');
    }

}
