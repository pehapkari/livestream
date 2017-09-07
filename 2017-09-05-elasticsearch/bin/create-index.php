<?php
declare(strict_types=1);

$container = require __DIR__ . '/../app/bootstrap.php';
\Tracy\Debugger::enable(false);
/* @var $indexer App\Model\MoviesIndexer */
$indexer = $container->getByType(\App\Model\MoviesIndexer::class);
$indexer->addNewIndex('for_fulltext');

echo "index created!\n";
