<?php

namespace App;

use Illuminate\Support\Facades\Log;



trait Loggable
{

	public function log(string $type, array $parameters = [])
	{
		Log::error('error');
	}
}
