<?php

namespace App\Filters;

use App\Filter;



final class BadWordsFilter implements Filter
{

	public function check(string $email, string $message): bool
	{
		if ($message === 'Hovno') {
			return false;
		}

		return true;
	}
}
