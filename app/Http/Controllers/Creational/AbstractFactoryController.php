<?php


namespace App\Http\Controllers\Creational;

use App\AbstractFactory\Vehicles\Factories\ElectricVehicleFactory;
use App\AbstractFactory\Vehicles\Factories\GasolineVehicleFactory;
use Illuminate\Http\JsonResponse;

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
     * @return JsonResponse
     */
    public function electricCar($model, $color, $power, $space): JsonResponse
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
     * @return JsonResponse
     */
    public function gasolineCar($model, $color, $power, $space): JsonResponse
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
     * @return JsonResponse
     */
    public function electricScooter($model, $color, $power): JsonResponse
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
     * @return JsonResponse
     */
    public function gasolineScooter($model, $color, $power): JsonResponse
    {
        $vehicle = $this->gasolineVehicleFactory->createScooter($model, $color, $power);

        return response()->json([
            'feature' => $vehicle->showFeatures()
        ]);
    }
}