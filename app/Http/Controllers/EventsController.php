<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use DateTime;
use Carbon\Carbon;
use App\Http\Requests\EventFormRequest;
use App\Mail\EventMail;


class EventsController extends Controller
{
    public function index(){

    	//$nextEvents = event::all();

    	

		$tomorrow = Carbon::now()->addDay();

    	// get previous events
    	$pastEvents = event::whereDate('start_at', '<', $tomorrow)->where(function ($query) {$query->where('type','=','open')->orWhere('creator_id', '=', (auth()->user())?auth()->user()->id:'');})->orderBy('start_at','asc')->get();

    	// get futur open events
    	$nextEvents = event::whereDate('start_at', '>=', $tomorrow)->where(function ($query) {$query->where('type','=','open')->orWhere('creator_id', '=', (auth()->user())?auth()->user()->id:'');})->orderBy('start_at','asc')->get();

    	return view('events.index',compact('pastEvents'),compact('nextEvents'));
    }

    public function show(Event $event){

    	return view('events.show',compact('event'));//->withReviews($reviews);
    }

    public function create(Event $event)
    {
    	if(auth()->user())
    		return view('events.create',compact('event'));
    	else
    		return $this->index();
    }

    public function store(EventFormRequest $request)
    {

		$type = 'open';

		// if not admin type = private
		if (auth()->user()->role_id != 1)
			$type = 'private';
		$request->type = $type;

		// let the auth user book a new event
		auth()->user()->book( 
    		$event = new Event(request(
                ['name', 'nb_attendees', 'start_at', 'description','type'
                ]))
    	);

		// send them an email
        \Mail::to(auth()->user(), 'contact@marcelandmarcel.com')->send(new EventMail($event));


		return \Redirect::route('contact')->with('message', 'Thanks for contacting us, We will shortly revert!');
	}

}
