<?php

include(__DIR__ . '/../bootstrap.php');

$exchange = 'phpkari.direct';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(HOST, PORT, USER, PASS);
$channel = $connection->channel();
$channel->exchange_declare($exchange, 'direct', false, true, false);
$channel = $connection->channel();

$i = 0;
$msg = new \PhpAmqpLib\Message\AMQPMessage('', ['content_type' => 'text/plain']);
while ($i < 1000) {
	$id = uniqid('dataProducer');
	$channel->basic_publish($msg->setBody("message INFO {$i};{$id}"), $exchange, 'info');
	$channel->basic_publish($msg->setBody("message WARN {$i};{$id}"), $exchange, 'warn');
	if (($i % 2) == 0) {
		$channel->basic_publish($msg->setBody("message WARN {$i};{$id}"), $exchange, 'critical');
	}
	$i++;
	echo 'Pushing data ' . $id . PHP_EOL;
}

$channel->close();
$connection->close();
