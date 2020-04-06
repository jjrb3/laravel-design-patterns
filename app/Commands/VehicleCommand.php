<?php
namespace App\Commands;

/**
 * Class Vehicle
 * @package App\Models
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class VehicleCommand
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var int
     */
    protected $entryDateStock = 0;

    /**
     * @var float
     */
    protected $salePrice = 0.0;

    /**
     * Vehicle constructor.
     * @param string $name
     * @param int $entryDateStock
     * @param float $salePrice
     */
    public function __construct(string $name, int $entryDateStock, float $salePrice)
    {
        $this->name = $name;
        $this->entryDateStock = $entryDateStock;
        $this->salePrice = $salePrice;
    }

    /**
     * @param int $currentDatetime
     * @return int
     */
    public function getDurationStock(int $currentDatetime): int
    {
        return $currentDatetime - $this->entryDateStock;
    }

    /**
     * @param float $coefficient
     */
    public function modifyPrice(float $coefficient): void
    {
        $this->salePrice = round($coefficient * $this->salePrice, 2);
    }

    /**
     * @return string
     */
    public function show(): string
    {
        return sprintf(
            'Name: %s. Price: %s. Entry date stock: %s.',
            $this->name,
            $this->salePrice,
            $this->entryDateStock
        );
    }
}