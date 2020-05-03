<?php

namespace Tests\Feature\app\Http\Controllers\Behavioral;

use App\Http\Controllers\Behavioral\MementoController;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Tests\TestCase;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Class MementoControllerTest
 * @package Tests\Feature\app\Http\Controllers\Behavioral
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class MementoControllerTest extends TestCase
{
    /**
     * @var MementoController
     */
    private $mementoController;

    /**
     * Setup the test environment.
     *
     * @return void
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->mementoController = $this->app->make(MementoController::class);
    }

    /**
     * Execute pattern.
     *
     * @return void
     */
    public function testExecutePartner(): void
    {
        $mementoResult = $this->mementoController->__invoke();

        $this->assertEquals($mementoResult->getStatusCode(), HttpResponse::HTTP_OK);
        $this->assertCount(4, $mementoResult->getOriginalContent()['complete_history']);
        $this->assertCount(3, $mementoResult->getOriginalContent()['undo_memento']);
    }
}
