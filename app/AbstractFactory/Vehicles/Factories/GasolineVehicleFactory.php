<?php


namespace App\AbstractFactory\Vehicles\Factories;

use App\AbstractFactory\Vehicles\Car\GasolineCar;
use App\AbstractFactory\Vehicles\Interfaces\FactoryCarInterface;
use App\AbstractFactory\Vehicles\Scooter\GasolineScooter;

/**
 * Class GasolineVehicleFactory
 * @package AbstractFactory\Vehicles\Factories
 */
class GasolineVehicleFactory implements FactoryCarInterface
{
    /**
     * @param string $model
     * @param string $color
     * @param int $power
     * @param float $space
     *
     * @return GasolineCar
     */
    public function createCar(string $model, string $color, int $power, float $space): GasolineCar
    {
        return new GasolineCar($model, $color, $power, $space);
    }

    /**
     * @param string $model
     * @param string $color
     * @param int $power
     *
     * @return GasolineScooter
     */
    public function createScooter(string $model, string $color, int $power): GasolineScooter
    {
        return new GasolineScooter($model, $color, $power);
    }
}