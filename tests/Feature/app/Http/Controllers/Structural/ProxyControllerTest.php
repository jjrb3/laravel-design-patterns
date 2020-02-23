<?php

namespace Tests\Feature\app\Http\Controllers\Structural;

use Tests\TestCase;
use App\Http\Controllers\Structural\ProxyController;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Class ProxyController
 * @package Tests\Feature\app\Http\Controllers\Structural
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class ProxyControllerTest extends TestCase
{
    /**
     * @var ProxyController
     */
    private $proxyController;

    /**
     * @var array
     */
    private $urls = [];

    /**
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->proxyController = $this->app->make(ProxyController::class);
        $this->urls = [
            '',
            'http://dummy.restapiexample.com/api/v1/employees',
            'http://dummy.restapiexample.com/api/v1/employee/1',
            'http://dummy.restapiexample.com/api/v1/employees'
        ];
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testProxy(): void
    {
        foreach ($this->urls as $url) {

            $jsonResponse = json_decode(
                $this->proxyController
                    ->__invoke($url)
                    ->getContent()
            );

            $this->assertNotEmpty($jsonResponse);

            switch ($url) {
                case '':
                    $this->assertEquals($jsonResponse->error, 'The URI is required.');
                    break;
                default:
                    if (!empty($jsonResponse->json->data)) {
                        $this->assertGreaterThanOrEqual(0, count($jsonResponse->json->data));
                    }
            }

        }

        $this->assertTrue(true);
    }
}
