<?php

namespace App\UseCases\WebServices\Interfaces;

/**
 * Class CatalogueUseCaseInterface
 * @package App\UseCases\WebServices\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface CatalogueUseCaseInterface
{
    /**
     * @param int $minimumAmount
     * @param int $maximumAmount
     * @return array
     */
    public function findVehicles(int $minimumAmount, int $maximumAmount): array;
}