<?php

namespace App\Http\Controllers;
use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function test() {
        // Mail::to("nguyenhuulocla2006@gmail.com")
        // ->send(new EmailNotification());
        echo "abc";
    }

}
