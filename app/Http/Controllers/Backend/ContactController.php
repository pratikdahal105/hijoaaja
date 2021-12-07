<?php

namespace App\Http\Controllers\Backend;

use App\Mail\ReplyMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public $path = 'backend.pages.';

    public function index(){
        $contacts = Contact::orderBY('created_at', 'DESC')->get();
        return view($this->path.'contact.list', compact('contacts'));
    }

    public function messageDetail($id){
        $contact = Contact::where('id', $id)->first();
        $data['status'] = 1;
        $contact->update($data);
        return view($this->path.'contact.detail', compact('contact'));
    }

    public function messageNotSeen($id){
        $contact = Contact::where('id', $id)->first();
        $data['status'] = 0;
        $contact->update($data);
        return redirect()->back();
    }

    public function mailSend(Request $request){
        $request->validate([
           'reply' => 'required'
        ]);

        $detail = [
          'subject' => $request->subject,
            'to' => $request->to,
            'reply' => $request->reply,
        ];

        Mail::to($detail['to'])->send(new ReplyMail($detail));
        return redirect()->back();
    }
}
