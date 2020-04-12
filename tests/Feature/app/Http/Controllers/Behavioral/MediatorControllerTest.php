<?php

namespace Tests\Feature\app\Http\Controllers\Behavioral;

use App\Http\Controllers\Behavioral\MediatorController;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Class MediatorControllerTest
 * @package Tests\Feature\app\Http\Controllers\Behavioral
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class MediatorControllerTest extends TestCase
{
    /**
     * @var MediatorController
     */
    private $mediatorController;

    /**
     * Setup the test environment.
     *
     * @return void
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->mediatorController = $this->app->make(MediatorController::class);
    }

    /**
     * Execute partners.
     *
     * @return void
     */
    public function testExecutePartner(): void
    {
        $mediatorResponse = $this->mediatorController->__invoke();

        $this->assertEquals($mediatorResponse->getStatusCode(), Response::HTTP_OK);
        $json = json_decode($mediatorResponse->getContent());
        $this->assertEquals($json->options[0], 'First Name');
        $this->assertEquals($json->options[1], 'Last Name');
        $this->assertEquals($json->options[4], 'Co-monetary first name');
        $this->assertEquals($json->options[5], 'Co-monetary last name');
    }
}
