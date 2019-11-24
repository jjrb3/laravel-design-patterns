<?php
namespace App\Factories\Orders\Client;

use App\Factories\Orders\Abstracts\ClientAbstract;
use App\Factories\Orders\Abstracts\OrderAbstract;
use App\Factories\Orders\Order\CreditOrder;

class CreditClient extends ClientAbstract
{
	/**
	 * @param float $quantity
	 *
	 * @return OrderAbstract
	 */
	protected function createOrder(float $quantity): OrderAbstract
	{
		return new CreditOrder($quantity);
	}
}