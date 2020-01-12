<?php

namespace App\Http\Controllers\Structural;

use App\UseCases\Forms\Exceptions\AppleFormException;
use App\UseCases\Forms\Exceptions\GetFormException;
use App\UseCases\Forms\Exceptions\HtmlFormException;
use App\UseCases\Forms\Interfaces\GetFormUseCaseInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Exception;

/**
 * Class BridgeController
 * @package App\Http\Controllers\Structural
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class BridgeController
{
    /**
     * @var GetFormUseCaseInterface
     */
    private $getFormUseCase;

    /**
     * BridgeController constructor.
     * @param GetFormUseCaseInterface $getFormUseCase
     */
    public function __construct(GetFormUseCaseInterface $getFormUseCase)
    {
        $this->getFormUseCase = $getFormUseCase;
    }

    /**
     * @param string $country
     * @param string $implementation
     * @return JsonResponse
     */
    public function getRegistrationNumber(string $country, string $implementation): JsonResponse
    {
        try {
            return response()->json([
                'information' => $this->getFormUseCase->handle($country, $implementation)
            ], HttpResponse::HTTP_OK);
        } catch (AppleFormException | HtmlFormException | GetFormException | Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}