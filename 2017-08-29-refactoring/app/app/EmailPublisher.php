<?php

namespace App;

final class EmailPublisher implements Publishable
{

	/**
	 * @var Publishable
	 */
	private $publisher;

	public function __construct(Publishable $publisher)
	{
		$this->publisher = $publisher;
	}

	public function publish(string $article)
	{
		$this->publisher->publish($article);

		var_dump('send an email with ' . $article);
	}
}
