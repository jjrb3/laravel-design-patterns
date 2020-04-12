<?php
namespace App\Http\Controllers\Behavioral;

use App\UseCases\Words\Interfaces\WordsCollectionUseCaseInterface;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Throwable;
use Illuminate\Http\JsonResponse;

/**
 * Class IteratorController
 * @package App\Http\Controllers\Behavioral
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class IteratorController
{
    /**
     * @var WordsCollectionUseCaseInterface
     */
    private $wordsCollection;

    /**
     * IteratorController constructor.
     * @param WordsCollectionUseCaseInterface $wordsCollection
     */
    public function __construct(WordsCollectionUseCaseInterface $wordsCollection)
    {
        $this->wordsCollection = $wordsCollection;
    }

    /**
     * @param array $positions
     * @return JsonResponse
     */
    public function __invoke(array $positions): JsonResponse
    {
        $normalCollection = [];
        $reverseCollection = [];

        try {
            foreach ($positions as $position) {
                $this->wordsCollection->setWord($position);
            }

            foreach ($this->wordsCollection->getIterator() as $item) {
                $normalCollection[] = $item;
            }

            foreach ($this->wordsCollection->getReverseIterator() as $item) {
                $reverseCollection[] = $item;
            }

            return response()->json([
                'normal' => $normalCollection,
                'reverse' => $reverseCollection
            ], HttpResponse::HTTP_OK);
        } catch (Throwable $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}