<?php

namespace App\Http\Controllers\Structural;

use App\UseCases\ManageDocuments\Exceptions\DocumentHtmlException;
use App\UseCases\ManageDocuments\Exceptions\GetDocumentException;
use App\UseCases\ManageDocuments\Interfaces\GetDocumentUseCaseInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

/**
 * Class AdapterController
 * @package App\Http\Controllers\Structural
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class AdapterController
{
    /**
     * @var GetDocumentUseCaseInterface
     */
    private $getDocumentUseCase;

    /**
     * AdapterController constructor.
     * @param GetDocumentUseCaseInterface $getDocumentUseCase
     */
    public function __construct(GetDocumentUseCaseInterface $getDocumentUseCase)
    {
        $this->getDocumentUseCase = $getDocumentUseCase;
    }

    /**
     * @param string $content
     * @param string $type
     * @param string $format
     * @return JsonResponse
     */
    public function getDocument(string $content, string $type, string $format): JsonResponse
    {
        try {
            return response()->json([
                'document' => $this->getDocumentUseCase->handle($content, $type, $format)
            ], HttpResponse::HTTP_OK);
        } catch (DocumentHtmlException | GetDocumentException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}