<?php

namespace App\UseCases\WebServices;

use App\UseCases\WebServices\Interfaces\DocumentManagementUseCaseInterface;

/**
 * Class DocumentManagementUseCase
 * @package App\UseCases\WebServices
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class DocumentManagementUseCase implements DocumentManagementUseCaseInterface
{
    /**
     * @param int $index
     * @return string
     */
    public function document(int $index): string
    {
        return "Number document {$index}";
    }
}