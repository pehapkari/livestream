<?php

namespace App;

final class FacebookPublisher implements Publishable
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
		var_dump('publishing to the Facebook also.');

		$this->publisher->publish($article);
	}
}
