<?php

include(__DIR__ . '/../bootstrap.php');

$exchange = 'phpkari.topic';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(HOST, PORT, USER, PASS);
$channel = $connection->channel();
$channel->exchange_declare($exchange, 'topic', false, true, false);
$channel = $connection->channel();

$i = 0;
$msg = new \PhpAmqpLib\Message\AMQPMessage('', ['content_type' => 'text/plain']);
while ($i < 1000) {
	$id = uniqid('dataProducer');
	$channel->basic_publish($msg->setBody("message PHP INFO {$i};{$id}"), $exchange, 'logs.php.info');
	$channel->basic_publish($msg->setBody("message PHP WARN {$i};{$id}"), $exchange, 'logs.php.warn');
	$channel->basic_publish($msg->setBody("message Apache INFO {$i};{$id}"), $exchange, 'logs.apache.info');
	$channel->basic_publish($msg->setBody("message Apache WARN {$i};{$id}"), $exchange, 'logs.apache.warn');
	if (($i % 2) == 0) {
		$channel->basic_publish($msg->setBody("message PHP CRITICAL {$i};{$id}"), $exchange, 'logs.php.critical');
		$channel->basic_publish($msg->setBody("message Apache CRITICAL {$i};{$id}"), $exchange, 'logs.apache.critical');
	}
	$i++;
	echo 'Pushing data ' . $id . PHP_EOL;
}

$channel->close();
$connection->close();
