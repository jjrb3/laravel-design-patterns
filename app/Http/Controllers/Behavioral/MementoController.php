<?php

namespace App\Http\Controllers\Behavioral;

use App\Services\CaretakerService;
use App\Services\OriginatorService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Throwable;

/**
 * Class MementoController
 * @package App\Http\Controllers\Behavioral
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class MementoController
{
    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        try {
            $originator = new OriginatorService('Super-duper-super-puper-super.');
            $caretaker = new CaretakerService($originator);

            for ($i = 0; $i < 4; $i++) {
                $caretaker->backup();
                $originator->doSomething();
            }

            $history = $caretaker->showHistory();
            $caretaker->undo();

            return response()->json([
                'complete_history' => $history,
                'undo_memento' => $caretaker->showHistory()
            ], HttpResponse::HTTP_OK);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}