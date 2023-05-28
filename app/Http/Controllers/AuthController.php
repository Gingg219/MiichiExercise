<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\UserLoginHandlerRequest;
use App\Http\Requests\Auth\UserRegisteringRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web');
    }

    public function login()
    {
        return view('client.auth.login');
    }

    public function login_handler(UserLoginHandlerRequest $request)
    {
        $user = User::query()
            ->where('email', $request->email)
            ->first();
        $checkUser=true;
        if (!Hash::check($request->get('password'), $user->password)) {
            $checkUser=false;
        }
        if (!empty($user)&&$checkUser) {
            Auth::guard('web')->login($user);
            return redirect()->route('client.home');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match.',
            ]);
        }
    }
    public function register()
    {
        return view('client.auth.register');
    }

    public function  registering(UserRegisteringRequest $request)
    {
        $password = Hash::make($request->password);
        $name=$request->name;
        $email=$request->email;
        $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ]);
        Auth::guard('web')->login($user);
        return redirect()->route('client.home');
    }
}
