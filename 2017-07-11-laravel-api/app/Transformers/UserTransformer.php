<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;



class UserTransformer extends TransformerAbstract
{

	protected $showEmail = true;



	public function transform(User $user)
	{
		$response = [
			'id'   => $user->id,
			'name' => $user->name
		];

		if ($this->showEmail === true) {
			$response['email'] = $user->email;
		}

		return $response;
	}



	public function hideEmail()
	{
		$this->showEmail = false;

		return $this;
	}
}
