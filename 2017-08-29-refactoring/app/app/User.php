<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
{

	use Notifiable;
	use Loggable;


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];



	public function presenter(): UserPresenter
	{
		$this->log('presenter access', [
			'class' => UserPresenter::class
		]);

		return new UserPresenter($this);
	}



	public function getPresenterAttribute()
	{
		return $this->presenter();
	}
}
