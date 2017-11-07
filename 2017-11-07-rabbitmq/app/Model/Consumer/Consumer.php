<?php

namespace App\Model\Consumer;

/**
 * Class Consumer
 * @package App\Model\Consumer
 */
class Consumer extends AbstractConsumer
{
	/**
	 * Start a consumer on an existing connection.
	 *
	 * @param string $exchange
	 * @param $queue
	 */
	public function start($exchangeType = 'fanout', $exchange = 'router', $queue = 'msgs')
	{
		echo 'Starting consumer.' . PHP_EOL;

		$this->channel = $this->connection->channel();
		$this->channel->queue_declare($queue, false, true, false, false);
		$this->channel->exchange_declare($exchange, $exchangeType, false, true, false);
		$this->channel->queue_bind($queue, $exchange, $routingKey);
		$this->channel->basic_consume(
			$queue,
			$this->consumerTag,
			false,
			false,
			false,
			false,
			[$this, 'messageHandler']
		);

		echo 'Waiting for messages.' . PHP_EOL;
		while (count($this->channel->callbacks)) {
			$this->channel->wait();
		}
		echo 'Exit wait.' . PHP_EOL;
	}
}
