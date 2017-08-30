<?php

namespace App;

use App\Filters\BadWordsFilter;
use App\Filters\BlacklistFilter;
use App\Filters\FridayFilter;
use Exception;



final class Forum
{

	private $filters = [
		BadWordsFilter::class,
		BlacklistFilter::class,
		FridayFilter::class
	];



	public function delete()
	{

	}

	public function post(string $email, string $message)
	{
		foreach($this->filters as $filter) {
			if ((new $filter)->check($email, $message) === false) {
				throw new Exception('You can`t send the message due to ' . class_basename($filter));
			}
		}

		var_dump('insert!');
//		$this->db->insert(compact('email', 'message'));
	}
}
