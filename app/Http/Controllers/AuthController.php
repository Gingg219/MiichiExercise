<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('client.auth.login');
    }

    public function register()
    {
        return view('client.auth.register');
    }
}
