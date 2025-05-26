<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    function show()
    {
        return view('contact.show');
    }

    function sendEmail(Request $request)
    {
        $input = $request->all(); // lấy tất cả các request

        Mail::send('contact.sendmail', $input,

        function ($message) use ($input) {
            $message->to('nguyenphuochao456@gmail.com', 'Quản trị')
            ->subject("Khách hàng {$input['fullname']}")
            ->replyTo($input["email"])
            ->from($input["email"]);
        });
    }
}
