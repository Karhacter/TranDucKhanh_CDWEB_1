<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('frontend.login');
    }

    public function dologin(Request $request)
    {
        $credentials = [
            'password' => $request->password,
            'status' => 1
        ];

        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->username;
        } else {
            $credentials['username'] = $request->username;
        }

        // Attempt to log in with the given credentials
        if (Auth::attemptWhen($credentials)) {
            return redirect()->route('site.home');
        } else {
            return redirect()->route('website.getlogin')->with('message', ['type' => 'danger', 'msg' => 'Tài khoản hoặc mật khẩu không đúng']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('site.home');
    }
}
