<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;


class Wine extends Model
{
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function addReview($review)
    {
    	$this->reviews()->create(compact('review'));
    }

    public function wineDescrip()
    {
        return collect($this->toArray())
                ->only(['grape', 'eye', 'nose','taste','pairing'])
                ->all();
    }


    public function masterReview()
    {
        return collect($this->toArray())
                ->only(['eye', 'nose','taste','pairing'])
                ->all();
    }

    public function grapeSoilAndAged()
    {
        return collect($this->toArray())
                ->only(['grape', 'soil','aged'])
                ->all();
    }
}
