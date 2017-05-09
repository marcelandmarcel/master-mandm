<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    protected $guarded = array('id');

	public function wine()
    {
        return $this->belongsTo('App\Wine');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getFullReview(){
    	return collect($this->toArray())
                ->only(['eye', 'nose','taste','pairing'])
                ->all();
    }
}
