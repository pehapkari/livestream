<?php
declare(strict_types=1);

$container = require __DIR__ . '/../app/bootstrap.php';
\Tracy\Debugger::enable(false);
/* @var $indexer App\Model\MoviesIndexer */
$indexer = $container->getByType(\App\Model\MoviesIndexer::class);
$indexer->setIndexName('elasticsearch_php');

$count = $indexer->indexAll();

echo "$count movies indexed to ElasticSearch!\n";
