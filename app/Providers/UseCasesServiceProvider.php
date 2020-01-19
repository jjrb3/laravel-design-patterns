<?php

namespace App\Providers;

use App\UseCases\Forms\GetFormUseCase;
use App\UseCases\Forms\Interfaces\GetFormUseCaseInterface;
use App\UseCases\ManageDocuments\GetDocumentUseCase;
use App\UseCases\ManageDocuments\Interfaces\GetDocumentUseCaseInterface;
use App\UseCases\ProductForm\GetProductFormUseCase;
use App\UseCases\ProductForm\Interfaces\GetProductFormUseCaseInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class UseCasesServiceProvider
 * @package App\Providers
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class UseCasesServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    public $classes = [
        GetDocumentUseCaseInterface::class => GetDocumentUseCase::class,
        GetFormUseCaseInterface::class => GetFormUseCase::class,
        GetProductFormUseCaseInterface::class => GetProductFormUseCase::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->classes as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
