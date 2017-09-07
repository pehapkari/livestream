<?php
/**
 * Created by PhpStorm.
 * User: Azathoth
 * Date: 2017-09-05
 * Time: 20:47
 */

$container = require __DIR__ . '/../app/bootstrap.php';
\Tracy\Debugger::enable(false);
/** @var \Elasticsearch\Client $es */
$es = $container->getByType(\Elasticsearch\Client::class);

$query = [
	'index' => 'elasticsearch_php',
	'type' => 'movie',
	'id' => 14
];
$result1 = $es->get($query);

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
$result = $es->search($query);
print('done');
