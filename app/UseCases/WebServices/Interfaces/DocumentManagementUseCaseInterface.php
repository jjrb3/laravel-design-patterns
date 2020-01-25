<?php

namespace App\UseCases\WebServices\Interfaces;

/**
 * Interface DocumentManagementUseCaseInterface
 * @package App\UseCases\WebServices\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface DocumentManagementUseCaseInterface
{
    /**
     * @param int $index
     * @return string
     */
    public function document(int $index): string;
}