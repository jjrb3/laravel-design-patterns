<?php

namespace App\UseCases\Vehicles;

use App\UseCases\Vehicles\Interfaces\OptionFactoryUseCaseInterface;

/**
 * Class OptionFactoryUseCase
 * @package App\UseCases\Vehicles
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class OptionFactoryUseCase implements OptionFactoryUseCaseInterface
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @param string $name
     * @return VehicleOptionUseCase
     */
    public function getOption(string $name): VehicleOptionUseCase
    {
        if (array_key_exists($name, $this->options))
        {
            $result = $this->options[$name];
        } else {
            $result = new VehicleOptionUseCase($name);
            $this->options[$name] = $result;
        }

        return $result;
    }
}