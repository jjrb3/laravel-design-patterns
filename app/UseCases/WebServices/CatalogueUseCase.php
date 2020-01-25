<?php

namespace App\UseCases\WebServices;

use App\UseCases\WebServices\Interfaces\CatalogueUseCaseInterface;

/**
 * Class CatalogueUseCase
 * @package App\UseCases\WebServices
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class CatalogueUseCase implements CatalogueUseCaseInterface
{
    /**
     * @var array
     */
    protected $vehicleDescriptions = [];

    public function __construct()
    {
        $this->vehicleDescriptions[] = new VehicleDescriptionUseCase('Berlina 5 puertas', 6000);
        $this->vehicleDescriptions[] = new VehicleDescriptionUseCase('Compacto 3 puertas', 4000);
        $this->vehicleDescriptions[] = new VehicleDescriptionUseCase('Espace 5 puertas', 8000);
        $this->vehicleDescriptions[] = new VehicleDescriptionUseCase('Break 5 puertas', 7000);
        $this->vehicleDescriptions[] = new VehicleDescriptionUseCase('Coupé 2 puertas', 9000);
        $this->vehicleDescriptions[] = new VehicleDescriptionUseCase('Utilitario 3 puertas', 5000);
    }

    /**
     * @param int $minimumAmount
     * @param int $maximumAmount
     * @return array
     */
    public function findVehicles(int $minimumAmount, int $maximumAmount): array
    {
        $result = [];

        foreach ($this->vehicleDescriptions as $vehicleDescription)
        {
            $price = $vehicleDescription->getPrice();

            if ($price >= $minimumAmount && $price <= $maximumAmount)
            {
                $result[] = $vehicleDescription->getDescription();
            }
        }

        return $result;
    }
}