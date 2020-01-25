<?php

namespace App\UseCases\WebServices\Interfaces;

/**
 * Interface FacadeWebServiceUseCaseInterface
 * @package App\UseCases\WebServices\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface FacadeWebServiceUseCaseInterface
{
    /**
     * @param int $index
     * @return string
     */
    public function document(int $index): string;

    /**
     * @param int $minimumAmount
     * @param int $maximumAmount
     * @return array
     */
    public function findVehicles(int $minimumAmount, int $maximumAmount): array;
}