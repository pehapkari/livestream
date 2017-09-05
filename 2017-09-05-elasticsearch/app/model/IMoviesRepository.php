<?php
declare(strict_types=1);

namespace App\Model;

use Nette;


/**
 * Movies repository.
 */
interface IMoviesRepository
{
	public function findBy(array $filters = []);

}
