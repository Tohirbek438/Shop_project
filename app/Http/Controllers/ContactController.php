<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function contact(){
        return view('contact.contact');
    }
    public function saveContact(Request $request){
      
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:200|max:250',
            'status' => 'required'
        ]);
      


        Contact::create($data);

        toastr()->success('Message is sent successfully!');
        return redirect('/contact')->with('message','Message is sent successfully!');
        
        
    }
}
