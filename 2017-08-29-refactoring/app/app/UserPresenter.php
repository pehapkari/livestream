<?php

namespace App;

final class UserPresenter
{

	/**
	 * @var User
	 */
	private $user;



	public function __construct(User $user)
	{
		$this->user = $user;
	}



	public function fullName(): string
	{
		return sprintf('%s %s', $this->user->first_name, $this->user->last_name);
	}

}
