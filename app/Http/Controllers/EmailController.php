<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Mail\ContactValidationEmail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    function contact(Request $request)
    {
        $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required'],
            'subject' => ['required'],
            'message' => ['required'],
        ]);

        $data = [
            'firstname' => $request->firstname,
            'message' => $request->message,
            'email' => $request->email,
            'subject' => $request->subject,
        ];

        Mail::to($request->email)->send(new ContactValidationEmail($data));
        Mail::to('matis.rideau@hotmail.com')->send(new ContactEmail($data));

        return back()->with('success', 'Contact ok. Ajouter config lang');
    }
}
