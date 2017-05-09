<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;
use App\Wine;

class ReviewsController extends Controller
{
	public function __construct()
	{

		$this->middleware('auth')->except(['index','show']);

	}

    public function store(){

    	$this->validate(request(),[
    		'taste'=>'required',
    		'nose'=>'required',
    		'review'=>'required',
            'wine_id'=>'required']);
    	
    	auth()->user()->publish( 
    		new Review(request(
                ['nose','taste','pair','review','eye','wine_id'
                ]))
    	);
    
        session()->flash('message', 'Your review has been taken into account, thanks :)');

    	return redirect('/');
    }

    public function index(){

        $wines = review::all();
        //dd($review);
        return view('review.index',compact('reviews'));
    }

    public function show(Review $review){
        //$review = DB::table('wines')->find($id);

        return view('reviews.show',compact('review'));
    }

    public function create(Wine $wine = NULL){
        //$review = DB::table('wines')->find($id);


        if($wine == NULL){
            $selectWineForReview = true;
            $wines = wine::all();
            return view('wines.index',compact('wines'), compact('selectWineForReview'));
        }
        else
             return view('reviews.create',compact('wine'));

    }

}
