<?php

namespace App\Filters;

use App\Filter;



final class BlacklistFilter implements Filter
{

	public function check(string $email, string $message): bool
	{
		return true;
	}
}
