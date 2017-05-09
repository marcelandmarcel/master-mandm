<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reviews()
    {
        return $this->hasMany('Review::class');
    }

    public function events()
    {
        return $this->hasMany('App\Event','creator_id');
    }

    public function friends()
    {
        return $this->belongsToMany('User', 'edges', 'from_id', 'to_id');
    }

    public function addFriend(User $user)
    {
        $this->friends()->attach($user->id);
    }

    public function removeFriend(User $user)
    {
        $this->friends()->detach($user->id);
    }

    public function publish(Review $review)
    {
        $this->reviews()->save($review);
    }

    public function book(Event $event)
    {
        $this->events()->save($event);
    }
}
