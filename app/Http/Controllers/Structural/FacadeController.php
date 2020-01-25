<?php

namespace App\Http\Controllers\Structural;

use App\UseCases\WebServices\Interfaces\FacadeWebServiceUseCaseInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

/**
 * Class FacadeController
 * @package App\Http\Controllers\Structural
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class FacadeController
{
    /**
     * @var FacadeWebServiceUseCaseInterface
     */
    private $facadeWebServiceUseCase;

    /**
     * FacadeController constructor.
     * @param FacadeWebServiceUseCaseInterface $facadeWebServiceUseCase
     */
    public function __construct(FacadeWebServiceUseCaseInterface $facadeWebServiceUseCase)
    {
        $this->facadeWebServiceUseCase = $facadeWebServiceUseCase;
    }

    /**
     * @param array $documentsNumber
     * @param int $startRange
     * @param int $endRange
     * @return JsonResponse
     */
    public function __invoke(array $documentsNumber, int $startRange, int $endRange): JsonResponse
    {
        try {
            $documentation = [];

            foreach ($documentsNumber as $documentNumber) {
                $documentation[] = $this->facadeWebServiceUseCase->document($documentNumber);
            }

            return response()->json([
                'number_documents' => $documentation,
                'vehicles' => $this->facadeWebServiceUseCase->findVehicles($startRange, $endRange)
            ], HttpResponse::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}