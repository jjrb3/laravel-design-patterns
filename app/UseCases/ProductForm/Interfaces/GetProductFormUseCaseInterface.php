<?php

namespace App\UseCases\ProductForm\Interfaces;

/**
 * Interface GetProductFormUseCaseInterface
 * @package App\UseCases\ProductForm\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface GetProductFormUseCaseInterface
{
    /**
     * @param array $formParameters
     * @return string
     */
    public function handle(array $formParameters): string;
}