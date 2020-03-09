<?php

namespace Tests\Feature\app\Http\Controllers\Behavioral;

use App\Clients\ChainResponsibility;
use App\Http\Controllers\Behavioral\ChainResponsibilityController;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

/**
 * Class ChainResponsibilityControllerTest
 * @package Tests\Feature\app\Http\Controllers\Behavioral
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class ChainResponsibilityControllerTest extends TestCase
{
    /**
     * @var ChainResponsibilityController
     */
    private $chainResponsibilityController;

    /**
     * @var ChainResponsibility
     */
    private $chainResponsibilityClient;

    /**
     * @var Request
     */
    private $request;

    /**
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->getRequest();
        $this->bindRequest();
        $this->chainResponsibilityController = $this->app->make(ChainResponsibilityController::class);
        $this->chainResponsibilityClient = $this->app->make(ChainResponsibility::class);
    }

    /**
     * @return void
     * @throws BindingResolutionException
     */
    public function testExample(): void
    {
        $chainResponse = $this->chainResponsibilityController->__invoke(
            $this->request,
            $this->chainResponsibilityClient
        );

        $this->assertEquals($chainResponse->getStatusCode(), HttpResponse::HTTP_OK);
    }

    /**
     * Create request.
     *
     * @return void
     */
    private function getRequest(): void
    {
        $request = new Request();
        $request->setMethod('POST');
        $request->replace([
            'full_name' => 'Jeremy Reyes',
            'role_id' => 1,
            'age' => 29,
            'username' => 'JJrb3',
            'email' => 'jjrb6@hotmail.com',
            'city_id' => 2
        ]);

        $this->request = $request;
    }

    /**
     * Bind request.
     *
     * @return void
     */
    private function bindRequest(): void
    {
        $this->app->bind(Request::class, function() {
            return $this->request;
        });
    }
}



