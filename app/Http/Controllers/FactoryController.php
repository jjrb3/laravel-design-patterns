<?php

namespace App\Http\Controllers;


use App\Factories\Orders\Client\CreditClient;
use App\Factories\Orders\Client\DiscountClient;

/**
 * Class AbstractFactoryController
 * @package App\Http\Controllers
 */
class FactoryController
{
    /**
     * @var DiscountClient
     */
    private $discountClient;

    /**
     * @var CreditClient
     */
    private $creditClient;

    /**
     * FactoryController constructor.
     */
    public function __construct()
    {
        $this->discountClient = new DiscountClient();
        $this->creditClient   = new CreditClient();
    }

    /**
     * @param float $quantity
     * @return \Illuminate\Http\JsonResponse
     */
    public function discountClient(float $quantity)
    {
        return response()->json([
            'pays' => $this->discountClient->newOrder($quantity)
        ]);
    }

    /**
     * @param float $quantity
     * @return \Illuminate\Http\JsonResponse
     */
    public function creditClient(float $quantity)
    {
        return response()->json([
            'pays' => $this->creditClient->newOrder($quantity)
        ]);
    }
}