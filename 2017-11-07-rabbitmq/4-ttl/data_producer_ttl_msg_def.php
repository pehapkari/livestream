<?php

include(__DIR__ . '/../bootstrap.php');

$exchange = 'amq.fanout';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(HOST, PORT, USER, PASS);
$channel = $connection->channel();

$i = 0;
while ($i < 5) {
	$id = uniqid('dataProducer');
	$msgProperties = [
		'content_type' => 'text/plain',
		'expiration' => 15000,
	];
	$msg = new \PhpAmqpLib\Message\AMQPMessage("message {$i};{$id}", $msgProperties);
	$channel->basic_publish($msg, $exchange);
	$i++;
	echo 'Pushing data ' . $id . PHP_EOL;
}

$channel->close();
$connection->close();
