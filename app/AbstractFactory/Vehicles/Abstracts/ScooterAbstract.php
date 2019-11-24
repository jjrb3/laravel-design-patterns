<?php
namespace App\AbstractFactory\Vehicles\Abstracts;

/**
 * Class ScooterAbstract
 *
 * @package AbstractFactory\Abstracts
 */
abstract class ScooterAbstract
{
	/**
	 * @var string
	 */
	protected $model;

	/**
	 * @var string
	 */
	protected $color;

	/**
	 * @var int
	 */
	protected $power;

	/**
	 * ScooterAbstract constructor.
	 *
	 * @param string $model
	 * @param string $color
	 * @param int    $power
	 */
	public function __construct(string $model, string $color, int $power)
	{
		$this->model = $model;
		$this->color = $color;
		$this->power = $power;
	}

	/**
	 * @return string
	 */
	public abstract function showFeatures(): string;
}