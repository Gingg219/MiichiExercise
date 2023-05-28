<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AdminType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginHandlerRequest;
use App\Http\Requests\Auth\AdminRegisteringRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $admin = Admin::query()
            ->where('email', $request->email)
            ->first();
        $checkAdmin=true;
        if (!Hash::check($request->password, $admin->password)) {
            $checkAdmin=false;
        }
        session()->put('role', $admin->role);
        if (!empty($admin)&&$checkAdmin) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.home');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match.',
            ]);
        }
    }

    public function register()
    {
        return view('admin.auth.register');
    }

    public function  registering(AdminRegisteringRequest $request)
    {
        $password = Hash::make($request->password);
        $name=$request->name;
        $email=$request->email;
        $role= AdminType::Admin;
        $admin = Admin::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'role' => $role,
            ]);
        Auth::guard('admin')->login($admin);
        return redirect()->route('admin.home');
    }
}
