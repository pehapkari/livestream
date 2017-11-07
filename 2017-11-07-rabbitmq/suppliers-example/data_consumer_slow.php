<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;

include_once __DIR__ . '/../bootstrap.php';

$exchange = 'amq.fanout';
$queueName = 'supplier-data';
$connection = new AMQPStreamConnection(HOST, PORT, USER, PASS, VHOST);
$channel = $connection->channel();

$channel->queue_declare($queueName, false, true, false, false);
$channel->queue_bind($queueName, $exchange);

$callback = function (\PhpAmqpLib\Message\AMQPMessage $msg) {
	echo $msg->getBody() . PHP_EOL;
	usleep(500000);
	$msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};

$channel->basic_consume($queueName, 'supplierData' . getmypid(), false, false, false, false, $callback);

while (count($channel->callbacks)) {
	$channel->wait();
}
