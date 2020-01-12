<?php

namespace Tests\Feature\app\Http\Controllers\Structural;

use App\UseCases\Forms\GetFormUseCase;
use Illuminate\Contracts\Container\BindingResolutionException;
use App\Http\Controllers\Structural\BridgeController;
use Tests\TestCase;

/**
 * Class BridgeTest
 * @package Tests\Feature\app\Http\Controllers\Structural
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class BridgeTest extends TestCase
{
    /**
     * @var BridgeController
     */
    private $bridgeController;

    /**
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->bridgeController = $this->app->make(BridgeController::class);
    }

    /**
     * Html test.
     *
     * @return void
     */
    public function testHtml(): void
    {
        $form = $this->bridgeController
            ->getRegistrationNumber(GetFormUseCase::SPAIN_COUNTRY, GetFormUseCase::HTML_IMPLEMENTATION);

        $this->assertContains(GetFormUseCase::HTML_IMPLEMENTATION, $form->content());
    }

    /**
     * Apple test.
     *
     * @return void
     */
    public function testApple(): void
    {
        $form = $this->bridgeController
            ->getRegistrationNumber(GetFormUseCase::SPAIN_COUNTRY, GetFormUseCase::APPLE_IMPLEMENTATION);

        $this->assertContains(GetFormUseCase::APPLE_IMPLEMENTATION, $form->content());
    }
}
