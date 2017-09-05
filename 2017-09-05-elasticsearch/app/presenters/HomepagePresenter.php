<?php

namespace App\Presenters;


use App\Forms\FormFactory;
use App\Model\ArticleManager;
use App\Model\Entity\Article;
use App\Model\MoviesRepository;
use AppBundle\Entity\Movie;
use Elasticsearch\Client;
use Kdyby\Doctrine\EntityManager;
use Nette\Application\UI\Form;
use Nette\Utils\Paginator;
use Tracy\Debugger;

class HomepagePresenter extends BasePresenter {

	private const PER_PAGE = 10;

	/**
	 * @var MoviesRepository
	 * @inject
	 */
	public $moviesRepository;

	/**
	 * @var Client
	 * @inject
	 */
	public $es;

	/**
	 * @var FormFactory
	 * @inject
	 */
	public $formFactory;

	/**
	 * @var ArticleManager
	 * @inject
	 */
	public $articleManager;

	/** @var Article */
	private $article;

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

	public function actionElastic() {
		$query = [
			'index' => 'elasticsearch_php',
			'type' => 'movie',
			'id' => 14
		];
		$result1 = $this->es->get($query);
		var_dump($result1);

		$query = [
			'index' => 'elasticsearch_php',
			'type' => 'movie',
			'body' => [
				'query' => [
					'match' => [
						'duration' => 120
					]
//					'filtered' => [
//						'filter' => [
//							'range' => [
//								'duration' => [
//									'lte' => 90
//								]
//							]
//						]
//					]
				],
			]];
		$result = $this->es->search($query);
		var_dump($result);
	}

	public function createComponentSearchForm() {
		$form = $this->formFactory->create();
		$form->addText('search');
		$form->addSubmit('start_searching');
		$form->onSuccess[] = function (Form $form) {
			$this->article = $this->articleManager->searchFirst($form->getValues()->search);
		};
		return $form;
	}
	public function actionSearch() {

	}

	public function renderSearch() {
		$this->template->article = $this->article;
	}
}
