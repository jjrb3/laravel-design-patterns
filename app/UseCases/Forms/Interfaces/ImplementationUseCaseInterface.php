<?php

namespace App\UseCases\Forms\Interfaces;

/**
 * Interface ImplementationUseCaseInterface
 * @package App\UseCases\Forms\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface ImplementationUseCaseInterface
{
    /**
     * @param string $text
     */
    public function drawText(string $text): void;

    /**
     * @return string
     */
    public function manageIndicatedArea(): string;
}