<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;

include_once __DIR__ . '/../bootstrap.php';

$connection = new AMQPStreamConnection(HOST, PORT, USER, PASS, VHOST);
$channel = $connection->channel();
$exchange = 'supplier.topic';

$channel->exchange_declare($exchange, 'topic', false, false, false);

$i = 0;
while ($i < 10000) {
	$id = uniqid('supplierData');
	$msgProperties = [
		'content_type' => 'text/plain',
		'delivery_mode' => \PhpAmqpLib\Message\AMQPMessage::DELIVERY_MODE_PERSISTENT
	];
	$msg = new \PhpAmqpLib\Message\AMQPMessage("{$id};{$i}", $msgProperties);
	echo "Publishig data ID {$id}, data {$i}" . PHP_EOL;
	$channel->basic_publish($msg, $exchange, 'product.id');
	$channel->basic_publish($msg, $exchange, 'product.description');
	$channel->basic_publish($msg, $exchange, 'product.stock.amount');
	$channel->basic_publish($msg, $exchange, 'product.stock.delivery_date');
	$i++;
}
