<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactFormRequest;
use App\Mail\Contact;

class AboutController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(ContactFormRequest $request)
    {
        
	   // send them an email
        \Mail::to('contact@marcelandmarcel.com')->send(new Contact(
            $request->get('name'),
            $request->get('email'),
            $request->get('message')
        ));	    	


		return \Redirect::route('contact')->with('message', 'Thanks for contacting us, We will shortly revert!');
	}

	public function show(){

    	return view('about.show');//->withReviews($reviews);
    }
}
