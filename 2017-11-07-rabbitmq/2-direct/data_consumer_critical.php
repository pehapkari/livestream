<?php

include(__DIR__ . '/../bootstrap.php');

$callback = function (\PhpAmqpLib\Message\AMQPMessage $msg) {
	echo 'Processing ' . $msg->getBody() . PHP_EOL;
	$msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};

$exchange = 'phpkari.direct';
$queue = 'logger-critical';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(HOST, PORT, USER, PASS);
$channel = $connection->channel();

$channel->exchange_declare($exchange, 'direct', false, true, false);
$channel->queue_declare($queue, false, false, false, false);
$channel->queue_bind($queue, $exchange, 'critical');
$channel->basic_consume($queue, 'directInfoConsumer1_' . getmypid(), false, false, false, false, $callback);

/**
 * @param \PhpAmqpLib\Channel\AbstractChannel $channel
 * @param \PhpAmqpLib\Connection\AbstractConnection $connection
 */
//function shutdown(\PhpAmqpLib\Channel\AMQPChannel $channel, \PhpAmqpLib\Connection\AbstractConnection $connection)
//{
//	$channel->close();
//	$connection->close();
//	echo 'Closing consuming messages' . PHP_EOL;
//}
//
//register_shutdown_function('shutdown', $channel, $connection);

// Loop as long as the channel has callbacks registered
while (count($channel->callbacks)) {
	$channel->wait();
}
