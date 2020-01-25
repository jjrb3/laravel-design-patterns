<?php

namespace Tests\Feature\app\Http\Controllers\Structural;

use Illuminate\Contracts\Container\BindingResolutionException;
use App\Http\Controllers\Structural\FacadeController;
use Tests\TestCase;

/**
 * Class FacadeControllerTest
 * @package Tests\Feature\app\Http\Controllers\Structural
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class FacadeControllerTest extends TestCase
{
    /**
     * @var FacadeController
     */
    private $facadeController;

    /**
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->facadeController = $this->app->make(FacadeController::class);
    }

    /**
     * A basic feature test example.
     *
     * @group Facade
     * @return void
     */
    public function testExample(): void
    {
        $facadeResult = $this->facadeController->__invoke(
            [
                1,
                2
            ],
            6000,
            10000
        );

        $this->assertNotEmpty($facadeResult);
    }
}
