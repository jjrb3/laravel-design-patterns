<?php
namespace App\Http\Controllers\Behavioral;

use App\UseCases\Catalog\CatalogUseCase;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Throwable;

/**
 * Class CommandController
 * @package App\Http\Controllers\Behavioral
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class CommandController
{
    /**
     * @var CatalogUseCase
     */
    private $catalog;

    /**
     * CommandController constructor.
     * @param CatalogUseCase $catalog
     */
    public function __construct(CatalogUseCase $catalog)
    {
        $this->catalog = $catalog;
    }

    /**
     * @param array $vehiclesRequest
     * @return JsonResponse
     */
    public function __invoke(array $vehiclesRequest): JsonResponse
    {
        try {
            return response()->json(
                $this->catalog->handler($vehiclesRequest),
                HttpResponse::HTTP_OK
            );
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}