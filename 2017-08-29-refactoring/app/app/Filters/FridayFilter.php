<?php

namespace App\Filters;

use App\Filter;



final class FridayFilter implements Filter
{

	public function check(string $email, string $message): bool
	{
		return date('d') !== 6;
	}
}
