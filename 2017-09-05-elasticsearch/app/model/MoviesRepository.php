<?php
declare(strict_types=1);

namespace App\Model;

use AppBundle\Entity\Movie;
use Doctrine\ORM\EntityRepository;
use Kdyby\Doctrine\EntityManager;
use Nette,
	Nette\Security\Passwords;


class MoviesRepository implements IMoviesRepository
{
	use Nette\SmartObject;

	/**
	 * @var EntityManager
	 */
	private $entityManager;

	/**
	 * @var EntityRepository
	 */
	private $moviesRepository;

	public function __construct(EntityManager $entityManager) {
		$this->entityManager = $entityManager;
		$this->moviesRepository = $entityManager->getRepository(Movie::class);
	}

	public function findBy(array $filters = [])
	{
		$offset = $filters['offset'] ?? null;
		$limit = $filters['limit'] ?? null;
		unset($filters['limit']);
		unset($filters['offset']);
		$moviesTotal = $this->moviesRepository->countBy($filters);
		$qb = $this->moviesRepository->createQueryBuilder('movie');
		$qb->whereCriteria($filters)
			->setFirstResult($offset)
			->setMaxResults($limit);
		$movies = $qb->getQuery()->getArrayResult();
		$return = [
			'total' => $moviesTotal,
			'movies' => $movies,
		];

		return $return;
	}

}
