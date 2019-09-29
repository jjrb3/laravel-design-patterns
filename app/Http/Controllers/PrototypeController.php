<?php

namespace App\Http\Controllers;



use App\Prototypes\PHPBookPrototype;
use App\Prototypes\SQLBookPrototype;

/**
 * Class BuilderController
 * @package App\Http\Controllers
 */
class PrototypeController
{
    public const BOOK_ONE = 'SQL For Cats';

    public const BOOK_TWO = 'OReilly Learning PHP 5';

    public const BOOK_THREE = 'OReilly Learning SQL';

    /**
     * @var PHPBookPrototype
     */
    private $phpBookPrototype;

    /**
     * @var SQLBookPrototype
     */
    private $sqlBookPrototype;

    /**
     * PrototypeController constructor.
     */
    public function __construct()
    {
        $this->phpBookPrototype = new PHPBookPrototype();
        $this->sqlBookPrototype = new SQLBookPrototype();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBooks()
    {
        $bookOne   = clone $this->sqlBookPrototype;
        $bookTwo   = clone $this->phpBookPrototype;
        $bookThree = clone $this->sqlBookPrototype;

        $bookOne->setTitle(self::BOOK_ONE);
        $bookTwo->setTitle(self::BOOK_TWO);
        $bookThree->setTitle(self::BOOK_THREE);


        return response()->json([
            'books' => [
                self::BOOK_ONE => [
                    'title' => $bookOne->getTitle(),
                    'topic' => $bookOne->getTopic()
                ],
                self::BOOK_TWO => [
                    'title' => $bookTwo->getTitle(),
                    'topic' => $bookTwo->getTopic()
                ],
                self::BOOK_THREE => [
                    'title' => $bookThree->getTitle(),
                    'topic' => $bookThree->getTopic()
                ],
            ]
        ]);
    }
}