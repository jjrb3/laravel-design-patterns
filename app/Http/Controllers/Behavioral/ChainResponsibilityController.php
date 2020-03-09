<?php

namespace App\Http\Controllers\Behavioral;

use App\Clients\ChainResponsibility;
use App\Handlers\ReturnUserRegisterHandler;
use App\Handlers\ValidateCityHandler;
use App\Handlers\ValidateUserEmailHandler;
use App\Handlers\ValidateUserHandler;
use App\Handlers\ValidateUserRoleHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Throwable;

/**
 * Class ChainResposibilityController
 * @package App\Http\Controllers\Behavioral
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class ChainResponsibilityController
{
    /**
     * @param Request $request
     * @param ChainResponsibility $chain
     * @return JsonResponse
     */
    public function __invoke(Request $request, ChainResponsibility $chain): JsonResponse
    {
        try {
            $chainResult = $chain->run([
                ValidateUserEmailHandler::class,
                ValidateUserRoleHandler::class,
                ValidateCityHandler::class,
                ValidateUserHandler::class,
                ReturnUserRegisterHandler::class
            ]);

            return response()->json($chainResult, HttpResponse::HTTP_OK);

        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}