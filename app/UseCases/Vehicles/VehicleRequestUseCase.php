<?php

namespace App\UseCases\Vehicles;

use App\UseCases\Vehicles\Interfaces\OptionFactoryUseCaseInterface;
use App\UseCases\Vehicles\Interfaces\VehicleRequestUseCaseInterface;

/**
 * Class VehicleFactoryUseCase
 * @package App\UseCases\Vehicles
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class VehicleRequestUseCase implements VehicleRequestUseCaseInterface
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var array
     */
    protected $priceSellOptions = [];

    /**
     * @param string $name
     * @param int $sellPrice
     * @param OptionFactoryUseCase $factoryUseCase
     */
    public function addOptions(string $name, int $sellPrice, OptionFactoryUseCaseInterface $factoryUseCase): void
    {
        $this->options[] = $factoryUseCase->getOption($name);
        $this->priceSellOptions[] = $sellPrice;
    }

    /**
     * @return array
     */
    public function showOptions(): array
    {
        $result = [];

        foreach ($this->options as $index => $option)
        {
            $result[] = $option->show($this->priceSellOptions[$index]);
        }

        return $result;
    }
}