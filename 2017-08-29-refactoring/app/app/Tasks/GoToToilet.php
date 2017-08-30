<?php

namespace App\Tasks;

use App\Task;



final class GoToToilet implements Task
{

	public function do()
	{
		var_dump('making poopoo');
	}
}
