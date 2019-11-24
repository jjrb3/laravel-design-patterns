<?php
namespace App\Http\Controllers\Creational;

use App\Singletons\WhiteDocumentSingleton;
use Illuminate\Http\JsonResponse;

/**
 * Class SingletonController
 *
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
	 * @return JsonResponse
	 */
	public function getWhiteDocument(): JsonResponse
	{
		return response()->json(
			[
				'messages' => $this->messages
			]
		);
	}
}