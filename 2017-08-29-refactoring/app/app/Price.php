<?php

namespace App;

final class Price
{
	use Loggable;

	/**
	 * @var float
	 */
	private $value;



	public function __construct(float $value)
	{
		$this->value = $value;
	}



	public function get(): float
	{
		return $this->value;
	}



	public function inDollars(): float
	{
		return $this->value / 100;
	}



	public function asCurrency(): string
	{
		$this->log();

		return money_format('$%i', $this->inDollars());
	}



	public function __toString()
	{
		return $this->asCurrency();
	}
}
