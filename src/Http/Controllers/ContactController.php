<?php

namespace Infinity\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Infinity\Contact\Mail\SendContact;
use Infinity\Contact\Models\Contact;

class ContactController extends Controller
{
    public function index(){
        return view('contact::contact');
    }

    public function send(Request $request){
        Contact::create($request->all());

        Mail::to('test@test.com')->send(new SendContact($request->message,$request->name));

        return redirect(route('contact'));
    }
}
