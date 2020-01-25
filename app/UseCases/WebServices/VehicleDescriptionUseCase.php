<?php

namespace App\UseCases\WebServices;

/**
 * Class VehicleDescriptionUseCase
 * @package App\UseCases\WebServices
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class VehicleDescriptionUseCase
{
    /**
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $price;

    /**
     * CatalogueUseCase constructor.
     * @param string $description
     * @param int $price
     */
    public function __construct(string $description, int $price)
    {
        $this->description = $description;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }
}