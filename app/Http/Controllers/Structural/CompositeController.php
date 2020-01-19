<?php

namespace App\Http\Controllers\Structural;

use App\UseCases\ProductForm\Exceptions\GetProductFormException;
use App\UseCases\ProductForm\Interfaces\GetProductFormUseCaseInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Exception;

/**
 * Class CompositeController
 * @package App\Http\Controllers\Structural
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class CompositeController
{
    /**
     * @var GetProductFormUseCaseInterface
     */
    private $getProductFormUseCase;

    /**
     * CompositeController constructor.
     * @param GetProductFormUseCaseInterface $getProductFormUseCase
     */
    public function __construct(GetProductFormUseCaseInterface $getProductFormUseCase)
    {
        $this->getProductFormUseCase = $getProductFormUseCase;
    }

    /**
     * @param array $request
     * @return JsonResponse
     */
    public function __invoke(array $request): JsonResponse
    {
        try {
            return response()->json([
                'form' => $this->getProductFormUseCase->handle($request)
            ], HttpResponse::HTTP_OK);
        } catch (Exception | GetProductFormException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}