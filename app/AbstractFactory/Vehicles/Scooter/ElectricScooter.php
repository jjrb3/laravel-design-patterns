<?php
namespace App\AbstractFactory\Vehicles\Scooter;

use App\AbstractFactory\Vehicles\Abstracts\ScooterAbstract;

/**
 * Class ElectricScooter
 *
 * @package AbstractFactory
 */
class ElectricScooter extends ScooterAbstract
{
	/**
	 * ElectricScooter constructor.
	 *
	 * @param string $model
	 * @param string $color
	 * @param int    $power
	 */
	public function __construct(string $model, string $color, int $power)
	{
		parent::__construct($model, $color, $power);
	}

	/**
	 * @return string
	 */
	public function showFeatures(): string
	{
		return "Model electric scooter: {$this->model}, "
			. "color {$this->color}, "
			. "power {$this->power} and "
			. "space {$this->color}.";
	}
}