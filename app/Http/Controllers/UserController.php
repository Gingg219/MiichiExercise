<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth:web');
    }
    
    public function home()
    {
        return view('client.index');
    }
    
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('client.login');
    }
}
