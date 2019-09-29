<?php

namespace Tests\Feature\app\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PrototypeController extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDiscountClient()
    {
        $response = $this->get('/construction/prototype/books');

        dd($response);

        $response->assertJson([
            'pays' => [
                0 => 'El pago del pedido al contado de: 2,000 se ha realizado'
            ]
        ]);
    }
}
