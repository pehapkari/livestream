<?php
/**
 * Created by PhpStorm.
 * User: denkop
 * Date: 08.08.17
 * Time: 19:39
 */

class PizzaService
{
	/**
	 * @var \Aws\DynamoDb\DynamoDbClient
	 */
	private $dynamoDb;

	/** @var  \Aws\Sqs\SqsClient */
	private $sqs;

	public function __construct($dynamoDb, $sqs)
	{
		$this->dynamoDb = $dynamoDb;
		$this->sqs = $sqs;
	}

	public function placeOrder($sessionId, $pizzaId)
	{
		$orderId = substr(hash('sha256', $sessionId . $pizzaId . time()), 0, 8);
		$item = [
			'Item' => [
				'orderId' => [
					'S' => $orderId
				],
				'sessionId' => [
					'S' => $sessionId,
				],
				'pizzaId' => [
					'N' => $pizzaId,
				],
				'status' => [
					'S' => 'open'
				],
			],
			'TableName' => 'orders'
		];

		try {
			$this->dynamoDb->putItem($item);

			$message = [
				'orderId' => $orderId
			];
			$this->sqs->sendMessage([
				'MessageBody' => json_encode($message),
				'QueueUrl' => 'https://sqs.eu-west-1.amazonaws.com/274486625406/orders'
			]);
		} catch (\Exception $e) {
			return null;
		}

		return $orderId;
	}

	public function getOrderBy($id)
	{
		$request = [
			'Key' => [
				'orderId' => [
					'S' => $id
				]
			],
			'TableName' => 'orders'
		];

		$result = $this->dynamoDb->getItem($request);

		$item = $result->get('Item');

		if ($item !== null) {
			$item = $this->convertArray($item);
		}

		return $item;
	}

	private function convertArray($dynamoDbItem)
	{
		$result = [];
		foreach ($dynamoDbItem as $key => $value) {
			$result[$key] = reset($value);
		}

		return $result;
	}
}