<?php

namespace App\UseCases\Vehicles\Interfaces;

use App\UseCases\Vehicles\VehicleOptionUseCase;

/**
 * Interface OptionFactoryUseCaseInterface
 * @package App\UseCases\Vehicles\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface OptionFactoryUseCaseInterface
{
    /**
     * @param string $name
     * @return VehicleOptionUseCase
     */
    public function getOption(string $name): VehicleOptionUseCase;
}