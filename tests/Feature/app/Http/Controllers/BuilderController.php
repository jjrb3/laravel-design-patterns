<?php

namespace Tests\Feature\app\Http\Controllers;

use Tests\TestCase;

/**
 * Class BuilderController
 * @package Tests\Feature\app\Http\Controllers
 */
class BuilderController extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreatePdf()
    {
        $responseBuilder = $this->get(
            '/construction/builder/documentation-vehicle/1/Jeremy/jjrb6@hotmail.com'
        );

        $responseBuilder->assertExactJson([
            'documentation' => "Name: Jeremy\n\nEste documento es de ejemplo en formato pdf\n\nEmail: jjrb6@hotmail.com"
        ]);
    }
}
