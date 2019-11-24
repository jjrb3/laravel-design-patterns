<?php
namespace App\AbstractFactory\Vehicles\Car;

use App\AbstractFactory\Vehicles\Abstracts\CarAbstract;

/**
 * Class ElectricCar
 *
 * @package AbstractFactory
 */
class ElectricCar extends CarAbstract
{
	/**
	 * ElectricCar constructor.
	 *
	 * @param string $model
	 * @param string $color
	 * @param int    $power
	 * @param float  $space
	 */
	public function __construct(string $model, string $color, int $power, float $space)
	{
		parent::__construct($model, $color, $power, $space);
	}

	/**
	 * @return string
	 */
	public function showFeatures(): string
	{
		return "Model electric car: {$this->model}, " .
			"color {$this->color}, " .
			"power {$this->power} and " .
			"space {$this->color}.";
	}
}