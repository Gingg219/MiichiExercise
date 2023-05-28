<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UserLoginHandlerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('guest:web');
    }
    
    public function login()
    {
        return view('client.auth.login');
    }

    public function login_handler(UserLoginHandlerRequest $request)
    {
        $user=User::query()
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->first();
        if (!empty($user)) {
            Auth::guard('web')->login($user);
            return redirect()->route('client.home');
        }
        else{
            return back()->withErrors([
            'email' => 'The provided credentials do not match.',
            ]);
        }
        
    }
    public function register()
    {
        return view('client.auth.register');
    }
}
