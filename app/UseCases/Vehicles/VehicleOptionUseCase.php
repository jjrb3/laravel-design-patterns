<?php

namespace App\UseCases\Vehicles;

use App\UseCases\Vehicles\Interfaces\VehicleOptionUseCaseInterface;

/**
 * Class VehicleOptionUseCase
 * @package App\UseCases\Vehicles
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class VehicleOptionUseCase implements VehicleOptionUseCaseInterface
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var int
     */
    protected $standardPrice = 0;

    /**
     * VehicleOptionUseCase constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->description = "Description of {$name}";
        $this->standardPrice = 100;
    }

    /**
     * @param string $sellPrice
     * @return string
     */
    public function show(string $sellPrice): string
    {
        return "Option\n"
            . "Name: {$this->name}\n"
            . "{$this->description}\n"
            . "Standard price: {$this->standardPrice}\n"
            . "Sell price: {$sellPrice}\n\n";
    }
}