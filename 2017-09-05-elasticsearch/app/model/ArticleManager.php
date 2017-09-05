<?php

namespace App\Model;

use App\Model\DTO\ArticleDTO;
use App\Model\DTO\ArticleInterface;
use App\Model\Entity\Article;
use Elasticsearch\Client;
use Kdyby\Doctrine\EntityManager;
use Kdyby\Doctrine\EntityRepository;
use Nette\SmartObject;

class ArticleManager {

	use SmartObject;

	const INDEX_NAME = 'for_fulltext_3';
	const ES_TYPE = 'article';

	/** @var EntityManager */
	private $entityManager;

	/** @var EntityRepository */
	private $articleRepository;

	/** @var Client */
	private $es;

	public function __construct(EntityManager $entityManager, Client $es) {
		$this->entityManager = $entityManager;
		$this->articleRepository = $entityManager->getRepository(Article::class);
		$this->es = $es;
	}

	public function addArticle(string $title, string $text) {
		$article = new Article($title, $text);
		$this->entityManager->persist($article);
		$this->entityManager->flush($article);

		$this->es->index([
			'index' => self::INDEX_NAME,
			'type' => self::ES_TYPE,
			'id' => $article->getId(),
			'body' => [
				'title' => $article->getTitle(),
				'text' => $article->getText()
			]
		]);
	}

	public function search(string $text): array {

	}

	public function searchFirst(string $text): ?ArticleInterface {
		$result = $this->es->search([
			'index' => self::INDEX_NAME,
			'type' => self::ES_TYPE,
			'body' => [
				'query' => [
					'multi_match' => [
						'query' => $text,
						'fields' => [
							'title',
							'text'
						]
					]
				],
				'size' => 1
			]
		]);
		if ($result['hits']['total'] == 0) {
			return null;
		}
		$id = $result['hits']['hits'][0]['_id'];

		$data = $result['hits']['hits'][0]['_source'];
		return new ArticleDTO($id, $data['title'], $data['text']);
//		tady vracím entitu
//		return $this->articleRepository->find($id);
	}
}