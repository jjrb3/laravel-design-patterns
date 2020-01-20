<?php

namespace App\Http\Controllers\Structural;

use App\UseCases\MarkdownFormat\Interfaces\DisplayCommentAsAWebsiteUseCaseInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

/**
 * Class DecoratorController
 * @package App\Http\Controllers\Structural
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class DecoratorController
{
    /**
     * @var DisplayCommentAsAWebsiteUseCaseInterface
     */
    private $displayCommentAsAWebsiteUseCase;

    /**
     * DecoratorController constructor.
     * @param DisplayCommentAsAWebsiteUseCaseInterface $displayCommentAsAWebsiteUseCase
     */
    public function __construct(DisplayCommentAsAWebsiteUseCaseInterface $displayCommentAsAWebsiteUseCase)
    {
        $this->displayCommentAsAWebsiteUseCase = $displayCommentAsAWebsiteUseCase;
    }

    /**
     * @param string $type
     * @param string $html
     * @return JsonResponse
     */
    public function __invoke(string $type, string $html): JsonResponse
    {
        try {
            return response()->json([
                'html' => $this->displayCommentAsAWebsiteUseCase->handle($type, $html)
            ], HttpResponse::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}