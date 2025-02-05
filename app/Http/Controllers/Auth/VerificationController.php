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

    public function verify($id, $token)
    {
        $user = User::where('id', $id)
            ->where('remember_token', $token)
            ->first();
        if (!$user) {
            return redirect()->route('user.login')->with('error', 'Invalid user or token.');
        }
        $user->markEmailAsVerified();
        $user->remember_token = null;
        $user->save();
        $user->assignRole('user');
        Auth::login($user);
        return redirect()->route('user.dashboard')->with('success', 'Email verified successfully and logged in.');
    }
}
