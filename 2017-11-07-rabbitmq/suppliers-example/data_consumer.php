<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;

include_once __DIR__ . '/../bootstrap.php';

$exchange = 'supplier.topic';
$queueName = 'supplier-data-topic';
$connection = new AMQPStreamConnection(HOST, PORT, USER, PASS, VHOST);
$channel = $connection->channel();

$channel->queue_declare($queueName, false, true, false, false);
$channel->queue_declare($queueName . '2', false, true, false, false);
$channel->queue_declare($queueName . '3', false, true, false, false);
$channel->queue_declare($queueName . '4', false, true, false, false);
$channel->queue_declare($queueName . '5', false, true, false, false);
$channel->queue_bind($queueName, $exchange, 'product.id');
$channel->queue_bind($queueName . '2', $exchange, 'product.description');
$channel->queue_bind($queueName . '3', $exchange, 'product.stock.amount');
$channel->queue_bind($queueName . '4', $exchange, 'product.*');
$channel->queue_bind($queueName . '5', $exchange, 'product.#');

$callback = function (\PhpAmqpLib\Message\AMQPMessage $msg) {
	echo $msg->getBody() . PHP_EOL;
	$msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};

$channel->basic_consume($queueName . '5', 'supplierData' . getmypid(), false, false, false, false, $callback);

try {
	while (count($channel->callbacks)) {
		$channel->wait();
	}
} catch (\Exception $e) {
	echo 'Error '. $e->getMessage();
}
