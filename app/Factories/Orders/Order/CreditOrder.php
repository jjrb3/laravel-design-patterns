<?php


namespace App\Factories\Orders\Order;


use App\Factories\Orders\Abstracts\OrderAbstract;

/**
 * Class CreditOrder
 * @package Factory\Orders\Order
 */
class CreditOrder extends OrderAbstract
{
    /**
     * CreditOrder constructor.
     * @param $quantity
     */
    public function __construct($quantity)
    {
        parent::__construct($quantity);
    }

    /**
     * @return bool
     */
    public function validate(): bool
    {
        return $this->quantity >= 1000.0 && $this->quantity <= 5000.0;
    }

    public function pay(): string
    {
        return 'El pago del pedido a credito de: ' . number_format($this->quantity) . ' se ha realizado';
    }
}