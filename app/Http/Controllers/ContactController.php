<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact()
    {

        return view('contact-page');

    }

    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        
        $contact->save();
        session()->flash('notif.success', 'Mensagem enviada com sucesso!');
        return redirect()->route('contact-page');

    }
}
