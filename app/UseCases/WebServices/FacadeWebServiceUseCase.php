<?php

namespace App\UseCases\WebServices;

use App\UseCases\WebServices\Interfaces\CatalogueUseCaseInterface;
use App\UseCases\WebServices\Interfaces\DocumentManagementUseCaseInterface;
use App\UseCases\WebServices\Interfaces\FacadeWebServiceUseCaseInterface;

/**
 * Class FacadeWebServiceUseCase
 * @package App\UseCases\WebServices
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class FacadeWebServiceUseCase implements FacadeWebServiceUseCaseInterface
{
    /**
     * @var CatalogueUseCaseInterface
     */
    protected $catalogue;

    /**
     * @var DocumentManagementUseCaseInterface
     */
    protected $documentManagement;

    /**
     * FacadeWebServiceUseCase constructor.
     * @param CatalogueUseCaseInterface $catalogueUseCase
     * @param DocumentManagementUseCaseInterface $documentManagementUseCase
     */
    public function __construct(
        CatalogueUseCaseInterface $catalogueUseCase,
        DocumentManagementUseCaseInterface $documentManagementUseCase
    ) {
        $this->catalogue = $catalogueUseCase;
        $this->documentManagement = $documentManagementUseCase;
    }

    /**
     * @param int $index
     * @return string
     */
    public function document(int $index): string
    {
        return $this->documentManagement
            ->document($index);
    }

    /**
     * @param int $minimumAmount
     * @param int $maximumAmount
     * @return array
     */
    public function findVehicles(int $minimumAmount, int $maximumAmount): array
    {
        return $this->catalogue
            ->findVehicles(
                $minimumAmount - $maximumAmount,
                $minimumAmount + $maximumAmount
            );
    }
}