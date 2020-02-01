<?php

namespace App\UseCases\Vehicles\Interfaces;

use App\UseCases\Vehicles\OptionFactoryUseCase;

/**
 * Interface VehicleRequestUseCaseInterface
 * @package App\UseCases\Vehicles\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface VehicleRequestUseCaseInterface
{
    /**
     * @param string $name
     * @param int $sellPrice
     * @param OptionFactoryUseCaseInterface $factoryUseCase
     */
    public function addOptions(string $name, int $sellPrice, OptionFactoryUseCaseInterface $factoryUseCase): void;

    /**
     * @return array
     */
    public function showOptions(): array;
}