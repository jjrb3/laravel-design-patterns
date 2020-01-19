<?php

namespace Tests\Feature\app\Http\Controllers\Structural;

use Illuminate\Contracts\Container\BindingResolutionException;
use App\Http\Controllers\Structural\CompositeController;
use Tests\TestCase;

/**
 * Class CompositeControllerTest
 * @package Tests\Feature\app\Http\Controllers\Structural
 */
class CompositeControllerTest extends TestCase
{
    /**
     * @var CompositeController
     */
    private $compositeController;

    /**
     * @var array
     */
    private $formArray = [];

    /**
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->compositeController = $this->app->make(CompositeController::class);
        $this->formArray = $this->getFormArray();
    }

    /**
     * Get product form.
     *
     * @return void
     */
    public function testGetProductForm(): void
    {
        $formResult = $this->compositeController->__invoke($this->formArray);

        $this->assertEquals($formResult->getStatusCode(), 200);
        $this->assertIsArray($formResult->getOriginalContent());
        $this->assertArrayHasKey('form', $formResult->getOriginalContent());
        $this->assertNotEmpty($formResult->getOriginalContent()['form']);
    }

    /**
     * @return array
     */
    private function getFormArray(): array
    {
        return [
            'form' => [
                'name' => 'product',
                'title' => 'Add product',
                'url' => '/product/add',
                'inputs' => [
                    [
                        'name' => 'name',
                        'title' => 'Name',
                        'type' => 'text',
                    ], [
                        'name' => 'description',
                        'title' => 'Description',
                        'type' => 'text',
                    ]
                ]
            ],
            'fieldset' => [
                'name' => 'photo',
                'title' => 'Product photo',
                'inputs' => [
                    [
                        'name' => 'caption',
                        'title' => 'Caption',
                        'type' => 'text'
                    ], [
                        'name' => 'image',
                        'title' => 'Image',
                        'type' => 'file'
                    ]
                ]
            ],
            'data' => [
                'name' => 'Apple MacBook',
                'description' => 'A decent laptop.',
                'photo' => [
                    'caption' => 'Front photo.',
                    'image' => 'photo1.png',
                ]
            ]
        ];
    }
}
