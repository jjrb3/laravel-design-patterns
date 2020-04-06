<?php
namespace App\UseCases\Catalog;

use App\ArrayObject\VehicleList;
use App\Commands\VehicleCommand;

/**
 * Class Catalogue
 * @package App\Models
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class CatalogUseCase
{
    /**
     * @var VehicleList
     */
    protected $vehicleStock;

    /**
     * @var array
     */
    protected $orders = [];

    /**
     * Catalog constructor.
     */
    public function __construct()
    {
        $this->vehicleStock = new VehicleList();
    }

    /**
     * @param array $vehiclesRequest
     * @return array
     */
    public function handler(array $vehiclesRequest): array
    {
        foreach ($vehiclesRequest as $vehicle) {
            $vehicleCommand = new VehicleCommand(
                $vehicle['name'],
                $vehicle['stock'],
                $vehicle['price']
            );

            $this->add($vehicleCommand);
        }

        return $this->show();
    }

    /**
     * @param VehicleCommand $vehicle
     */
    private function add(VehicleCommand $vehicle): void
    {
        $this->vehicleStock->append($vehicle);
    }

    /**
     * @return array
     */
    private function show(): array
    {
        $vehicle = [];

        foreach ($this->vehicleStock->getIterator() as $vehicleStock) {
            $vehicle[] = $vehicleStock->show();
        }

        return $vehicle;
    }
}