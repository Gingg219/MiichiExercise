<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginHandlerRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function __construct() {
    //     $this->middleware('guest:admin');
    // }

    public function login()
    {
        return view('admin.auth.login');
    }
    
    public function login_handler(AdminLoginHandlerRequest $request)
    {
        $admin=Admin::query()
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->first();
        if (!empty($admin)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.home');
        }
        else{
            return back()->withErrors([
            'email' => 'The provided credentials do not match.',
            ]);
        }
        
    }

    public function register()
    {
        return view('admin.auth.register');
    }
}
