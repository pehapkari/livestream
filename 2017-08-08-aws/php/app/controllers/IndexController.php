<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
    }

    public function placeOrderAction()
	{
		if (!$this->request->isPost()) {
			$this->response->redirect('index');
		}

		/** @var PizzaService $service */
		$service = $this->getDI()->getShared('pizzaService');

		$orderId = $service->placeOrder($this->session->getId(), $this->request->getPost('pizzaId'));

		if ($orderId !== null) {
			$this->response->redirect('index/success/' . $orderId);
		}
	}

	public function successAction($orderId)
	{
		$this->view->orderId = $orderId;
	}

	public function orderStatusAction($orderId)
	{
		/** @var PizzaService $pizzaService */
		$pizzaService = $this->di->getShared('pizzaService');
		$this->view->order = $pizzaService->getOrderBy($orderId);
		$this->view->orderId = $orderId;
	}
}