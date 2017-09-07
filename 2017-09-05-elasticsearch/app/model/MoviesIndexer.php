<?php

namespace App\Model;

use AppBundle\Entity\Movie;
use Elasticsearch\Client;
use Kdyby\Doctrine\EntityManager;
use Nette;


/**
 * Product indexer
 */
class MoviesIndexer extends Nette\Object {
	/**
	 * @var EntityManager
	 */
	private $entityManager;

	/**
	 * @var Client
	 */
	private $es;

	/**
	 * Name of index to index to
	 *
	 * @var string
	 */
	private $indexName;

	public function __construct(EntityManager $entityManager, Client $es) {
		$this->es = $es;
		$this->entityManager = $entityManager;
	}

	/**
	 * Index name setter
	 *
	 * @param string $name
	 */
	public function setIndexName($name) {
		$this->indexName = $name;
	}

	/**
	 * Index all movies
	 *
	 * @return number
	 */
	public function indexAll() {
		/** @var Movie[] $movies */
		$movies = $this->entityManager->getRepository(Movie::class)->findAll();
		foreach ($movies as $movie) {

			$this->es->index([
				'index' => $this->indexName,
				'type' => 'movie',
				'id' => $movie->getId(),
				'body' => $movie->toArray()
			]);
		}

		return count($movies);
	}

	public function addNewIndex(string $name) {
		$createParams = [
			'index' => $name,
			'body' => $this->getIndexSettings()
		];
		$this->es->indices()->create($createParams);
	}

	protected function getIndexSettings() {
		//my schema, with some indexing
		$settings = [
			'settings' => [
				'index' => [
					'number_of_shards' => 1,
					'number_of_replicas' => 1,
				],
				'analysis' => [
					'analyzer' => [
						'default' => [
							'type' => 'custom',
							"tokenizer" => "standard",
							"filter" => [
								"lowercase",
								"stopwords_CZ",
//								"keywords_CZ",
								"hunspell_CZ",
//								"stemmer_CZ",
								"custom_stems",
								"asciifolding",
								"remove_duplicities",
							]
						],
					],
					'filter' => [
						'stopwords_CZ' => [
							'type' => 'stop',
							'stopwords' => [
								'_czech_',
							],
							'ignore_case' => true,
						],
						'hunspell_CZ' => [
							'type' => 'hunspell',
							'locale' => 'cs_CZ',
							'dedup' => true,
						],
						"stemmer_CZ" => [
							"type" => "stemmer",
							"language" => "czech"
						],
						'remove_duplicities' => [
							'type' => 'unique',
							'only_on_same_position' => false,
						],
						'custom_stems' => [
							"type" => "stemmer_override",
							"rules" => [
								"lidlu => lidl",
								"lidlem => lidl",
							]
						]

					],
				],
			],
//			'mappings' => [
//				'contract' => [
//					'properties' => [
//						'versionId' => [
//							'type' => 'string',
//							'index' => 'not_analyzed',
//						],
//						'subject' => [
//							'type' => 'string',
//							'index' => 'analyzed',
//						],
//					],
//				],
//			],
		];

		return $settings;
	}

}
