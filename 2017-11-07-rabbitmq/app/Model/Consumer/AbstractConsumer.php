<?php

namespace App\Model\Consumer;

/**
 * This class shows how you can use signals to handle consumers
 */
abstract class AbstractConsumer
{

	/**
	 * @var \PhpAmqpLib\Connection\AMQPSSLConnection
	 */
	protected $connection;

	/**
	 * @var \PhpAmqpLib\Channel\AMQPChannel
	 */
	protected $channel;

	/**
	 * Consumer tag
	 *
	 * @var string
	 */
	protected $consumerTag = 'consumer';

	/**
	 * Consumer constructor.
	 *
	 * @param string $host
	 * @param string $port
	 * @param string $user
	 * @param string $pass
	 */
	public function __construct($host = 'localhost', $port = '5672', $user = 'guest', $pass = 'guest')
	{
		if (extension_loaded('pcntl')) {
			define('AMQP_WITHOUT_SIGNALS', false);

			pcntl_signal(SIGTERM, [$this, 'signalHandler']);
			pcntl_signal(SIGHUP, [$this, 'signalHandler']);
			pcntl_signal(SIGINT, [$this, 'signalHandler']);
			pcntl_signal(SIGQUIT, [$this, 'signalHandler']);
			pcntl_signal(SIGUSR1, [$this, 'signalHandler']);
			pcntl_signal(SIGUSR2, [$this, 'signalHandler']);
			pcntl_signal(SIGALRM, [$this, 'alarmHandler']);
		} else {
			echo 'Unable to process signals.' . PHP_EOL;
			exit(1);
		}

		$this->connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(
			$host,
			$port,
			$user,
			$pass
		);
	}

	/**
	 * Start a consumer on an existing connection.
	 *
	 * @return void
	 */
	abstract function start();

	/**
	 * Signal handler
	 *
	 * @param  int $signalNumber
	 * @return void
	 */
	public function signalHandler($signalNumber)
	{
		echo 'Handling signal: #' . $signalNumber . PHP_EOL;
		global $consumer;

		switch ($signalNumber) {
			case SIGTERM:  // 15 : supervisor default stop
			case SIGQUIT:  // 3  : kill -s QUIT
				$consumer->stopHard();
				break;
			case SIGINT:   // 2  : ctrl+c
				$consumer->stop();
				break;
			case SIGHUP:   // 1  : kill -s HUP
				$consumer->restart();
				break;
			default:
				break;
		}
		return;
	}

	/**
	 * Alarm handler
	 *
	 * @param  int $signalNumber
	 * @return void
	 */
	public function alarmHandler($signalNumber)
	{
		echo 'Handling alarm: #' . $signalNumber . PHP_EOL;

		echo memory_get_usage(true) . PHP_EOL;
		return;
	}

	/**
	 * Message handler
	 *
	 * @param  \PhpAmqpLib\Message\AMQPMessage $message
	 * @return void
	 */
	public function messageHandler(\PhpAmqpLib\Message\AMQPMessage $message)
	{
		echo "\n--------\n";
		echo $message->body;
		echo "\n--------\n";

		$message->delivery_info['channel']->basic_ack($message->delivery_info['delivery_tag']);
		if ($message->body === 'quit') {
			$message->delivery_info['channel']->basic_cancel($message->delivery_info['consumer_tag']);
		}
	}

	/**
	 * Restart the consumer on an existing connection
	 */
	public function restart()
	{
		echo 'Restarting consumer.' . PHP_EOL;
		$this->stopSoft();
		$this->start();
	}

	/**
	 * Close the connection to the server
	 */
	public function stopHard()
	{
		echo 'Stopping consumer by closing connection.' . PHP_EOL;
		$this->connection->close();
	}

	/**
	 * Close the channel to the server
	 */
	public function stopSoft()
	{
		echo 'Stopping consumer by closing channel.' . PHP_EOL;
		$this->channel->close();
	}

	/**
	 * Tell the server you are going to stop consuming
	 * It will finish up the last message and not send you any more
	 */
	public function stop()
	{
		echo 'Stopping consumer by cancel command.' . PHP_EOL;
		// this gets stuck and will not exit without the last two parameters set
		$this->channel->basic_cancel($this->consumerTag, false, true);
	}

}
