<?php
namespace App\ArrayObject;

use App\Commands\VehicleCommand;
use ArrayObject;
use ArrayIterator;

/**
 * Class VehicleList
 * @package App\ArrayObject
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class VehicleList
{
    /**
     * @var ArrayObject
     */
    private $vehicles;

    /**
     * VehicleList constructor.
     */
    public function __construct()
    {
        $this->vehicles = new ArrayObject();
    }

    /**
     * @param VehicleCommand $vehicle
     */
    public function append(VehicleCommand $vehicle): void
    {
        $this->vehicles->append($vehicle);
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return $this->vehicles->getIterator();
    }
}