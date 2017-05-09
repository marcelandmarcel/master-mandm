<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wine;
use App\Review;

class WinesController extends Controller
{

    public function index(){

    	$wines = wine::all();
    	//dd($wines);
    	return view('wines.index',compact('wines'));
    }

    public function show(Wine $wine){
    	//$wine = DB::table('wines')->find($id);
    	//$reviews = $wine->reviews;
        
        // build your second collection with a subset of attributes. this new
        // collection will be a collection of plain arrays.
        $winesubset = $this->wineAttributes($wine);
        

    	return view('wines.show',compact('wine'),compact('winesubset'));//->withReviews($reviews);
    }

    public function wineAttributes(Wine $wine){
        return $winesubset = collect($wine->toArray())
                ->only(['grape', 'eye', 'nose','taste','pairing','soil','aged'])
                ->all();
    }
}
