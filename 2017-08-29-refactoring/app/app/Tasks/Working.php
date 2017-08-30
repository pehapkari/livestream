<?php

namespace App\Tasks;

use App\Task;



final class Working implements Task
{

	private $tasks = [];

	public function do()
	{
		foreach ($this->tasks as $task) {
			$task->do();
		}
	}

	public function addTask(Task $task)
	{
		$this->tasks[] = $task;
	}
}
