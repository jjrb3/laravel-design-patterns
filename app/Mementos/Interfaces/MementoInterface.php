<?php

namespace App\Mementos\Interfaces;

/**
 * Interface MementoInterface
 * @package App\Mementos\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface MementoInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getDate(): string;
}