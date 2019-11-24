<?php
namespace App\AbstractFactory\Vehicles\Interfaces;

/**
 * Interface FactoryCar
 *
 * @package AbstractFactory\Interfaces
 */
interface FactoryCarInterface
{
	/**
	 * @param string $model
	 * @param string $color
	 * @param int    $power
	 * @param float  $space
	 *
	 * @return mixed
	 */
	public function createCar(string $model, string $color, int $power, float $space);

	/**
	 * @param string $model
	 * @param string $color
	 * @param int    $power
	 *
	 * @return mixed
	 */
	public function createScooter(string $model, string $color, int $power);
}