<?php

namespace App\Http\Controllers\Structural;

use App\Services\Exceptions\DownloadJsonException;
use App\Services\Proxys\DownloadJsonServiceProxy;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Exception;

/**
 * Class ProxyController
 * @package App\Http\Controllers\Structural
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class ProxyController
{
    /**
     * @var DownloadJsonServiceProxy
     */
    private $downloadJsonService;

    /**
     * ProxyController constructor.
     * @param DownloadJsonServiceProxy $downloadJsonService
     */
    public function __construct(DownloadJsonServiceProxy $downloadJsonService)
    {
        $this->downloadJsonService = $downloadJsonService;
    }

    /**
     * @param string $url
     * @return JsonResponse
     */
    public function __invoke(string $url): JsonResponse
    {
        try {
            return response()->json([
                'json' => json_decode($this->downloadJsonService->download($url))
            ], HttpResponse::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}