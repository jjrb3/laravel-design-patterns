<?php

namespace App\UseCases\Vehicles\Interfaces;

/**
 * Interface VehicleOptionUseCaseInterface
 * @package App\UseCases\Vehicles\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface VehicleOptionUseCaseInterface
{
    /**
     * @param string $sellPrice
     * @return string
     */
    public function show(string $sellPrice): string;
}