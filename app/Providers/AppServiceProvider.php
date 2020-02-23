<?php

namespace App\Providers;

use App\Services\DownloadJsonService;
use App\Services\Interfaces\DownloadJsonServiceInterface;
use App\Services\Proxys\DownloadJsonServiceProxy;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    public $classes = [
        DownloadJsonServiceInterface::class => DownloadJsonService::class
    ];

    /**
     * Register any application services.
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
