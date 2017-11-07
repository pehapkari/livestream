<?php

include(__DIR__ . '/../bootstrap.php');

$exchange = 'phpkari.fanout';
$queue = 'supplier-data1';
$consumer = new \App\Model\Consumer\Consumer(HOST, PORT, USER, PASS);
$consumer->start('fanout', $exchange, $queue);
