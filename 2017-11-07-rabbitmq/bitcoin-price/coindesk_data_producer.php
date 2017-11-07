<?php

include(__DIR__ . '/bootstrap.php');

$startDate = '2014-10-31';
$endDate = '2017-11-01';
$data = file_get_contents("https://api.coindesk.com/v1/bpi/historical/close.json?start={$startDate}&end={$endDate}");
$data = json_decode($data, true);

$exchange = 'bitcoin.price';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(HOST, PORT, USER, PASS);
$channel = $connection->channel();

$channel->exchange_declare($exchange, 'direct', false, false, true);

foreach ($data['bpi'] as $date => $price) {
	$msg = new \PhpAmqpLib\Message\AMQPMessage("{$date},{$price}", ['content_type' => 'text/plain']);
	$channel->basic_publish($msg, $exchange, 'coindesk.price');
	echo 'Pushing data ' . $date . PHP_EOL;
}

$channel->close();
$connection->close();
