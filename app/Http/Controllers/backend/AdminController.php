<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ChatOpen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $data['users'] = User::query()->count();
        return view('backend.layouts.home', $data);
    }

    public function logout()
    {
        Auth()->logout();
        return to_route('user.login.form');

    }
}
