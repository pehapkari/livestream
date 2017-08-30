<?php



final class Order
{

	public function pay(array $order, $user)
	{
		$method = $this->paymentMethod($order, $user);

		$method->pay();
	}



	public function paymentMethod(array $order, $user): Payment
	{
		if ($user->hasBirthday()) {
			return new NoPayment;
		}

		if ($order['method'] === 'bank') {
			return new BankPayment;
		}

		return new CashPayment;
	}
}

// ...

$order = new Order($payment);



class NoPayment implements Payment
{

	public function pay()
	{
		// TODO: Implement pay() method.
	}
}



class CashPayment implements Payment
{

	public function pay()
	{
		// TODO: Implement pay() method.
	}
}



class BankPayment implements Payment
{

	public function pay()
	{
		// TODO: Implement pay() method.
	}
}
