<?php

namespace App\Http\Controllers\Structural;

use App\UseCases\Vehicles\Interfaces\OptionFactoryUseCaseInterface;
use App\UseCases\Vehicles\Interfaces\VehicleRequestUseCaseInterface;
use Illuminate\Http\JsonResponse;
use Exception;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

/**
 * Class FlyweightController
 * @package App\Http\Controllers\Structural
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class FlyweightController
{
    /**
     * @var string
     */
    public const BMW_VEHICLE = 'BMW';

    /**
     * @var string
     */
    public const MERCEDEZ_VEHICHLE = 'MERCEDEZ';

    /**
     * @var string
     */
    public const MAZDA_VEHICLE = 'MAZDA';

    /**
     * @var OptionFactoryUseCaseInterface
     */
    private $optionFactoryUseCase;

    /**
     * @var VehicleRequestUseCaseInterface
     */
    private $vehicleRequestUseCase;

    /**
     * FlyweightController constructor.
     * @param OptionFactoryUseCaseInterface $optionFactoryUseCase
     * @param VehicleRequestUseCaseInterface $vehicleRequestUseCase
     */
    public function __construct(
        OptionFactoryUseCaseInterface $optionFactoryUseCase,
        VehicleRequestUseCaseInterface $vehicleRequestUseCase
    ) {
        $this->optionFactoryUseCase = $optionFactoryUseCase;
        $this->vehicleRequestUseCase = $vehicleRequestUseCase;
    }

    /**
     * @param string $vehicle
     * @return JsonResponse
     */
    public function __invoke(string $vehicle): JsonResponse
    {
        try {
            $vehicleRequest = $this->vehicleRequestUseCase;

            switch ($vehicle) {
                case self::MAZDA_VEHICLE:
                    $vehicleRequest->addOptions('Air bag', 80, $this->optionFactoryUseCase);
                    $vehicleRequest->addOptions('Power steering', 90, $this->optionFactoryUseCase);
                    $vehicleRequest->addOptions('Power windows', 85, $this->optionFactoryUseCase);
                    break;

                default:
                    $vehicleRequest->addOptions('Air bag', 100, $this->optionFactoryUseCase);
                    $vehicleRequest->addOptions('Power steering', 120, $this->optionFactoryUseCase);
                    $vehicleRequest->addOptions('Power windows', 115, $this->optionFactoryUseCase);
                    break;
            }

            return response()->json([
                'options' => $vehicleRequest->showOptions()
            ], HttpResponse::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}