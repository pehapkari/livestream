<?php

namespace App\Presenters;


use App\Model\MoviesRepository;
use AppBundle\Entity\Movie;
use Kdyby\Doctrine\EntityManager;
use Nette\Utils\Paginator;

class HomepagePresenter extends BasePresenter {

	private const PER_PAGE = 10;

	/**
	 * @var MoviesRepository
	 * @inject
	 */
	public $moviesRepository;

	public function renderDefault($page = 1) {
		$paginator = new Paginator();
		$paginator->setItemsPerPage(self::PER_PAGE); // the number of records on page
		$paginator->setPage($page);
		// get products
		$filters = array_merge([
				'limit' => $paginator->getLength(),
				'offset' => $paginator->getOffset()
			], $this->getHttpRequest()->getQuery());
		unset($filters['page']);


		$userFilters = $this->getHttpRequest()->getQuery();
		unset($userFilters['page']);

		$result = $this->moviesRepository->findBy($filters);
//		$movies = $result['movies'];
		$moviesTotal = $result['total'];

		$paginator->setItemCount($moviesTotal); // the total number of records (e.g., a number of products)
		$this->template->userFilters = $userFilters;
		$this->template->paginator = $paginator;

		$this->template->movies = $result;
		$this->template->page = $page;
	}
}
