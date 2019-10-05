<?php


namespace App\Http\Controllers\Creational;

use App\Singletons\WhiteDocumentSingleton;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SingletonController
 * @package App\Http\Controllers\Creational
 */
class SingletonController
{
    /**
     * @var array|string
     */
    private $messages;

    /**
     * SingletonController constructor.
     */
    public function __construct()
    {
        WhiteDocumentSingleton::getInstance();
        WhiteDocumentSingleton::getInstance();

        $this->messages = WhiteDocumentSingleton::$message;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWhiteDocument(): Response
    {
        return response()->json([
            'messages' => $this->messages
        ]);
    }
}