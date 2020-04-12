<?php
namespace Tests\Feature\app\Http\Controllers\Behavioral;

use App\Http\Controllers\Behavioral\IteratorController;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Class IteratorControllerTest
 * @package Tests\Feature\app\Http\Controllers\Behavioral
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class IteratorControllerTest extends TestCase
{
    /**
     * @var IteratorController
     */
    private $iteratorController;

    /**
     * Setup the test environment.
     *
     * @return void
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->iteratorController = $this->app->make(IteratorController::class);
    }

    /**
     * Execute partners.
     *
     * @return void
     */
    public function testExecute(): void
    {
        $words = [
            'First',
            'Second',
            'Third'
        ];

        $iteratorResponse = $this->iteratorController->__invoke($words);

        $this->assertEquals($iteratorResponse->getStatusCode(), Response::HTTP_OK);
        $json = json_decode($iteratorResponse->getContent());

        foreach ($words as $key => $word) {
            $this->assertEquals($json->normal[$key], $word);
        }

        $cnt = 0;

        for ($i = count($words) - 1; $i > 0; $i--) {
            $this->assertEquals($json->reverse[$cnt++], $words[$i]);
        }
    }
}
