<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function contactIndex(){
        $contact = Contact::all();
        return view('admin.contact',compact('contact'));
    }
    public function contactDelete($id){
        $contact = Contact::find($id);
        if($contact->delete()){
           
        }
        else{
         
        }
    }
    public function ContactView($id){
        $contact = Contact::find($id);
        $contact->status = 1;
        $contact->save();
        return view('admin.contact-view',compact('contact'));
    }
}
