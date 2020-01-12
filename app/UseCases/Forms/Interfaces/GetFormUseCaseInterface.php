<?php


namespace App\UseCases\Forms\Interfaces;

/**
 * Interface GetFormUseCaseInterface
 * @package App\UseCases\Forms\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface GetFormUseCaseInterface
{
    /**
     * @param string $country
     * @param string $implementation
     * @return string
     */
    public function handle(string $country, string $implementation): string;
}