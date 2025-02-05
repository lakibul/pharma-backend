<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function showVerificationNotice()
    {
        return view('backend.auth.verify');
    }

    public function verify($token)
    {
        // Find the user by the verification token
        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            return redirect()->route('admin.login')->with('error', 'Invalid verification token.');
        }

        $user->markEmailAsVerified();
        $user->remember_token = null;
        $user->save();

        // Log the user in
        Auth::guard('web')->login($user);

        return redirect()->route('admin.login.form')->with('success', 'Email verified successfully.');
    }
}
