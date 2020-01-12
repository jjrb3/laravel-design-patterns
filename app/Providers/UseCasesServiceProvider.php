<?php

namespace App\Providers;

use App\UseCases\ManageDocuments\GetDocumentUseCase;
use App\UseCases\ManageDocuments\Interfaces\GetDocumentUseCaseInterface;
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
        GetDocumentUseCaseInterface::class => GetDocumentUseCase::class
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
