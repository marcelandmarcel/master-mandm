<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
	static $defaultEventImageUrl = 'events/defaultEvent.jpg';
	static $defaultEventLocation = '@shop';

	protected $attributes = array(
  		'image' => 'events/defaultEvent.jpg',
  		'location' => '@shop'
	);

	protected $types = [
        'open' => 'Open',
        'private' => 'Private'
    ];

    public function getTypes()
    {
        return $this->types;
    }

	protected $fillable = ['name', 'creator_id', 'start_at','description','nb_attendees','type','image'];

    public function market()
    {
        return $this->belongsTo('App\Market');
    }

    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeOfDate($query, $pastOrUp)
    {
    	$sign = '>=';
    	
    	if($pastOrUp == 'past')
    		$sign = '<';
		
		$tomorrow = Carbon::now()->addDay();

        return $query->where('start_at', $sign, $tomorrow);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

}
