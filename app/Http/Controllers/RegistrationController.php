<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
//use Mail;

class RegistrationController extends Controller
{

    public function __construct()
    {

        $this->middleware('guest',['except'=>'destroy']);

    }

    public function create()
    {
    	return view('registration.create');
    }

    public function store()
    {
    	//validate the form
    	$this->validate(request(), [
    			'name'=>'required',
    			'email'=>'required|email',
    			'password'=>'required'
    		]);


    	//create and save the user
		$user = User::create(request(['name','email','password']));
    	

    	// sign them in
    	auth()->login($user);


        // send them an email
        Mail::to($user)->send(new Welcome($user));

        // session flash message
        session()->flash('message', 'thanks so much for signing up!');

    	//redirect to the home page
    	return redirect()->home();

    }
}
