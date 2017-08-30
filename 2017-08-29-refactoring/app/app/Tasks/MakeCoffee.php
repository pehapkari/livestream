<?php

namespace App\Tasks;

use App\Task;



final class MakeCoffee implements Task
{

	public function do()
	{
		var_dump('making coffee');
	}
}
