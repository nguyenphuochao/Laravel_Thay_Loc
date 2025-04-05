<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // validate here

        // success
        $credentials = $request->only(['email', 'password']);
        $credentials['is_active'] = 1;

        if (!Auth::attempt($credentials)) {
            $request->session()->put('error', 'Sai thông tin đăng nhập');
        }

        return redirect()->route('index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
