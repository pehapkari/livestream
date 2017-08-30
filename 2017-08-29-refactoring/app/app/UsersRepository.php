<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;



final class UsersRepository
{

	/**
	 * @var User
	 */
	private $users;



	public function __construct(User $users)
	{
		$this->users = $users;
	}



	public function listOfActiveAdmins(): Collection
	{
		return $this->admins()
			->where('last_registration_at', '>', Carbon::now()->subWeeks(2))
			->orderBy('name')
			->get();
	}



	private function admins(): Builder
	{
		return $this->users->where('role', 'admin');
	}
}
