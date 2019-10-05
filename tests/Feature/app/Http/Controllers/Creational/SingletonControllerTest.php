<?php

namespace Tests\Feature\app\Http\Controllers\Creational;

use Tests\TestCase;

/**
 * Class SingletonController
 * @package Tests\Feature\app\Http\Controllers
 */
class SingletonControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGenerateInstances()
    {
        $this->get(
            route('whiteDocument')
        )
            ->assertStatus(200)
            ->assertExactJson([
                'messages' => [
                    0 => 'Instancia creada',
                    1 => 'La instancia ya fue creada'
                ]
            ]);
    }
}
