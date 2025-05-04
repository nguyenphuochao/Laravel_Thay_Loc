<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display the customer's account information page.
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function show()
    {
        $data = [];
        return view('customer.show', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dùng auth session lưu luôn
        /*
        $customer = Auth()->user();
        $customer->save();
        */
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
        $request->session()->put('success', 'Cập nhật tài khoản thành công');
        return redirect()->route('customer.show');
    }
}
