<?php

namespace Tests\Feature\app\Http\Controllers;

use Tests\TestCase;

class FactoryController extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDiscountClient()
    {
        $response = $this->get('/construction/factory/discount-client/2000.00');

        $response->assertJson([
            'pays' => [
                0 => 'El pago del pedido al contado de: 2,000 se ha realizado'
            ]
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreditClient()
    {
        $response = $this->get('/construction/factory/credit-client/13000.00');

        $response->assertJson([
            'pays' => []
        ]);
    }
}
