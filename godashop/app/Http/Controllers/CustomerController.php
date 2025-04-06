<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function show()
    {
        $data = [];
        return view('frontend.account_information', $data);
    }

    public function update(Request $request)
    {
        $customer = Auth::user();
        $customer->name = $request->input('fullname');
        $customer->mobile = $request->input('mobile');
        $oldPassword = $request->input('old_password');
        $dbPassword = $customer->password;
        $newPassword = $request->input('password');
        if ($oldPassword && $newPassword) {
            if (!Hash::check($oldPassword, $dbPassword)) {
                session()->put('error', 'Mật khẩu hiện tại chưa đúng');
                return redirect()->route('customer.show');
            }
            // Update password
            $customer->password = Hash::make($request->input('password'));
        }
        $customer->save();
        return redirect()->route('customer.show');
    }
}
