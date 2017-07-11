<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const PLATFORM_FACEBOOK = 'facebook';

    protected $dates = [
    	'publish_at'
    ];



	public function user()
	{
		return $this->belongsTo(User::class);
    }



	public function tags()
	{
		return $this->hasMany(Tag::class);
    }
}
