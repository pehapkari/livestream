<?php

namespace App;

class DatabasePublisher implements Publishable
{

	public function publish(string $article)
	{
		var_dump('publishing article (db) ' . $article);
	}
}
