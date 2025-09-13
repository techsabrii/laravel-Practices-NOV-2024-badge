<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //


public function index()
{

    $name = "Basit Sabri";
    $data = [
        'subject' => 'Test Email from Laravel',
        'message' => 'This is a test email using Laravel Mailable class.'
    ];

   $check =  Mail::to('basitsabrii67@gmail.com')->send(new SendMail($data, $name));

    return "Email Sent Successfully!";
}
}
