<?php


namespace App\Factories\Orders\Abstracts;


/**
 * Class ClientAbstract
 * @package Factory\Orders\Abstracts
 */
abstract class ClientAbstract
{
    /**
     * @var array
     */
    protected $order = [];

    /**
     * @param float $quantity
     * @return OrderAbstract
     */
    protected abstract function createOrder(float $quantity): OrderAbstract;

    /**
     * @param float $quantity
     * @return string
     */
    public function newOrder(float $quantity): array
    {
        $order = $this->createOrder($quantity);

        if ($order->validate()) {
            $this->order[] = $order->pay();
        }

        return $this->order;
    }
}