<?php

namespace Tests\Feature\app\Http\Controllers;

use Tests\TestCase;

/**
 * Class SingletonController
 * @package Tests\Feature\app\Http\Controllers
 */
class SingletonController extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $responseSingleton = $this->get('/construction/singleton/white-document');

        $responseSingleton->assertExactJson([
            'messages' => [
                0 => 'Instancia creada',
                1 => 'La instancia ya fue creada'
            ]
        ]);
    }
}
