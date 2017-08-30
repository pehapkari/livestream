<?php

namespace App;

final class Email
{

	public function __construct(string $email)
	{
		// validation
	}
}

final class Bank
{
	private $customers = [];



	public function addCustomer(Email $email, Address $address, Money $money)
	{
		$this->customers[] = compact('email', 'address', 'money');
	}
}

$bank = new Bank;
$bank->addCustomer('me@jakubkratina.cz', 'Praha', 100);

var_dump($bank);
