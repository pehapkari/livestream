<?php

namespace App;

final class Subscription
{

	/**
	 * @var float
	 */
	private $value;



	public function __construct(float $value)
	{
		$this->value = $value;
	}



	public function price()
	{
		return new Price($this->value);
	}
}
