<?php
namespace Tests\Feature\app\Http\Controllers\Behavioral;

use App\Http\Controllers\Behavioral\CommandController;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Class CommandControllerTest
 * @package Tests\Feature\app\Http\Controllers\Behavioral
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class CommandControllerTest extends TestCase
{
    /**
     * @var CommandController
     */
    private $command;

    /**
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->command = $this->app->make(CommandController::class);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExecCommand(): void
    {
        $payload = [
            [
                'name' => 'A01',
                'stock' => 1,
                'price' => 1000.0
            ],
            [
                'name' => 'A11',
                'stock' => 6,
                'price' => 2000.0
            ],
            [
                'name' => 'Z03',
                'stock' => 2,
                'price' => 3000.0
            ]
        ];

        $response = $this->command->__invoke($payload);

        $this->assertEquals($response->getStatusCode(), Response::HTTP_OK);

        $json = json_decode($response->getContent());

        foreach ($json as $key => $item) {
            $this->assertEquals(
                $item,
                sprintf(
                    'Name: %s. Price: %s. Entry date stock: %s.',
                    $payload[$key]['name'],
                    $payload[$key]['price'],
                    $payload[$key]['stock']
                )
            );
        }
    }
}
