<?php

namespace Tests\Feature\app\Http\Controllers\Structural;

use App\Http\Controllers\Structural\FlyweightController;
use Tests\TestCase;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Class FlyweightControllerTest
 * @package Tests\Feature\app\Http\Controllers\Structural
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class FlyweightControllerTest extends TestCase
{
    /**
     * @var FlyweightController
     */
    private $flyweightController;

    /**
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->flyweightController = $this->app->make(FlyweightController::class);
    }

    /**
     * Flyweight example.
     *
     * @group @flyweight
     * @return void
     */
    public function testFlyweightExample(): void
    {
        $vehicleOptions = $this->flyweightController->__invoke(FlyweightController::MAZDA_VEHICLE);

        $this->assertNotEmpty($vehicleOptions);
        $this->assertEquals(count(json_decode($vehicleOptions->getContent())->options), 3);
    }
}
