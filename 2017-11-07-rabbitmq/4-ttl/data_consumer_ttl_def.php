<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Wire\AMQPTable;

include(__DIR__ . '/../bootstrap.php');
error_reporting(E_ALL);
ini_set('display_errors', true);


$callback = function (\PhpAmqpLib\Message\AMQPMessage $msg) {
	echo 'Processing ' . $msg->getBody() . PHP_EOL;
	$msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};

$exchange = 'amq.fanout';
$queue = 'msg-ttl';

$connection = new AMQPStreamConnection(HOST, PORT, USER, PASS);
$channel = $connection->channel();

$queueArguments = new AMQPTable([
//	'x-dead-letter-exchange' => 't_test1',
//	'x-message-ttl' => 15000 // 15s
]);

//$channel->exchange_declare($exchange, 'direct', false, false, true);
$channel->queue_declare($queue, false, true, false, false, false, $queueArguments);
$channel->queue_bind($queue, $exchange);

$channel->basic_consume($queue, 'supplierConsumer1_' . getmypid(), false, false, false, false, $callback);

/**
 * @param \PhpAmqpLib\Channel\AbstractChannel $channel
 * @param \PhpAmqpLib\Connection\AbstractConnection $connection
 */
function shutdown(\PhpAmqpLib\Channel\AMQPChannel $channel, \PhpAmqpLib\Connection\AbstractConnection $connection)
{
	$channel->close();
	$connection->close();
	echo 'Closing consuming messages' . PHP_EOL;
}

register_shutdown_function('shutdown', $channel, $connection);

// Loop as long as the channel has callbacks registered
while (count($channel->callbacks)) {
	$channel->wait();
}
