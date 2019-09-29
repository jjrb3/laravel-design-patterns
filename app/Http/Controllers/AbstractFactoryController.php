<?php


namespace App\Http\Controllers;

use App\AbstractFactory\Vehicles\Factories\ElectricVehicleFactory;
use App\AbstractFactory\Vehicles\Factories\GasolineVehicleFactory;

/**
 * Class AbstractFactoryController
 * @package App\Http\Controllers
 */
class AbstractFactoryController
{
    /**
     * @var ElectricVehicleFactory
     */
    protected $electricVehicleFactory;

    /**
     * @var GasolineVehicleFactory
     */
    protected $gasolineVehicleFactory;

    /**
     * AbstractFactoryController constructor.
     */
    public function __construct()
    {
        $this->electricVehicleFactory = new ElectricVehicleFactory();
        $this->gasolineVehicleFactory = new GasolineVehicleFactory();
    }

    /**
     * @param $model
     * @param $color
     * @param $power
     * @param $space
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function electricCar($model, $color, $power, $space)
    {
        $vehicle = $this->electricVehicleFactory->createCar($model, $color, $power, $space);

        return response()->json([
            'feature' => $vehicle->showFeatures()
        ]);
    }

    /**
     * @param $model
     * @param $color
     * @param $power
     * @param $space
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gasolineCar($model, $color, $power, $space)
    {
        $vehicle = $this->gasolineVehicleFactory->createCar($model, $color, $power, $space);

        return response()->json([
            'feature' => $vehicle->showFeatures()
        ]);
    }

    /**
     * @param $model
     * @param $color
     * @param $power
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function electricScooter($model, $color, $power)
    {
        $vehicle = $this->electricVehicleFactory->createScooter($model, $color, $power);

        return response()->json([
            'feature' => $vehicle->showFeatures()
        ]);
    }

    /**
     * @param $model
     * @param $color
     * @param $power
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gasolineScooter($model, $color, $power)
    {
        $vehicle = $this->gasolineVehicleFactory->createScooter($model, $color, $power);

        return response()->json([
            'feature' => $vehicle->showFeatures()
        ]);
    }
}