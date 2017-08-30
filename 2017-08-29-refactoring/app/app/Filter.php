<?php

namespace App;

interface Filter
{
	public function check(string $email, string $message): bool;
}
