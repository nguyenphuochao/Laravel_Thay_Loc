<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $credentials['is_active'] = 1;
        if (!Auth::attempt($credentials)) {
            $request->session()->put('error', 'Sai thông tin đăng nhập');
        }
        return redirect()->route('fe.home');
    }
}
