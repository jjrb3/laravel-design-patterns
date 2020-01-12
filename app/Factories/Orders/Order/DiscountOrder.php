<?php

namespace App\Factories\Orders\Order;

use App\Factories\Orders\Abstracts\OrderAbstract;

/**
 * Class DiscountOrder
 * @package App\Factories\Orders\Order
 */
class DiscountOrder extends OrderAbstract
{
	/**
	 * DiscountOrder constructor.
	 *
	 * @param float $quantity
	 */
	public function __construct(float $quantity)
	{
		parent::__construct($quantity);
	}

	/**
	 * @return bool
	 */
	public function validate(): bool
	{
		return true;
	}

	public function pay(): string
	{
		return 'El pago del pedido al contado de: ' . number_format($this->quantity) . ' se ha realizado';
	}
}