<?php

namespace App\Tasks;

use App\Task;



final class Write implements Task
{

	public function do()
	{
		var_dump('writing');
	}
}
