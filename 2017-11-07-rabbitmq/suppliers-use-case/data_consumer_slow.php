<?php

include(__DIR__ . '/../bootstrap.php');
error_reporting(E_ALL);
ini_set('display_errors', true);

$callback = function (\PhpAmqpLib\Message\AMQPMessage $msg) {
	echo 'Processing ' . $msg->getBody() . PHP_EOL;
	usleep(200000);
	$msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
//	$msg->delivery_info['channel']->basic_cancel($msg->delivery_info['consumer_tag']);
};

$exchange = 'amq.direct';
$queue = 'supplier-data';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(HOST, PORT, USER, PASS);
$channel = $connection->channel();

//$channel->exchange_declare($exchange, 'direct', false, false, true);
$channel->queue_declare($queue, false, true, false, false);
//$channel->basic_qos(null, 1, null);
$channel->queue_bind($queue, $exchange, 'supplier.id');

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
