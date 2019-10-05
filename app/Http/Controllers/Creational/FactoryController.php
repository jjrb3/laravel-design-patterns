<?php

namespace App\Http\Controllers\Creational;


use App\Factories\Orders\Client\CreditClient;
use App\Factories\Orders\Client\DiscountClient;
use Illuminate\Http\JsonResponse;

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
     * @return JsonResponse
     */
    public function discountClient(float $quantity): JsonResponse
    {
        return response()->json([
            'pays' => $this->discountClient->newOrder($quantity)
        ]);
    }

    /**
     * @param float $quantity
     * @return JsonResponse
     */
    public function creditClient(float $quantity): JsonResponse
    {
        return response()->json([
            'pays' => $this->creditClient->newOrder($quantity)
        ]);
    }
}