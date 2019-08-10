<?php


namespace App\AbstractFactory\Vehicles\Abstracts;

/**
 * Class CarAbstract
 * @package Construction\AbstractFactory\Abstracts
 */
abstract class CarAbstract
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
     * @var float
     */
    protected $space;

    /**
     * CarAbstract constructor.
     *
     * @param string $model
     * @param string $color
     * @param int $power
     * @param float $space
     */
    public function __construct(string $model, string $color, int $power, float $space)
    {
        $this->model    = $model;
        $this->color    = $color;
        $this->power    = $power;
        $this->space    = $space;
    }

    /**
     * @return string
     */
    public abstract function showFeatures(): string;
}