<?php

include(__DIR__ . '/../bootstrap.php');

$exchange = 'phpkari.fanout';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(HOST, PORT, USER, PASS);
$channel = $connection->channel();
$channel->exchange_declare($exchange, 'fanout', false, true, false);
$channel = $connection->channel();

$i = 0;
while ($i < 5000) {
	$id = uniqid('dataProducer');
	$msg = new \PhpAmqpLib\Message\AMQPMessage("message {$i};{$id}", ['content_type' => 'text/plain']);
	$channel->basic_publish($msg, $exchange);
	$i++;
	echo 'Pushing data ' . $id . PHP_EOL;
}

$channel->close();
$connection->close();
