<?php

namespace App\Handlers\Abstracts;

use App\Handlers\Interfaces\BasicHandlerInterface;
use Illuminate\Http\Request;

/**
 * Class AbstractHandler
 * @package App\Handlers
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class BasicAbstractHandler implements BasicHandlerInterface
{
    /**
     * @var BasicHandlerInterface
     */
    protected $nextHandler;

    /**
     * @param Request $request
     * @return Request|null
     */
    public function handle(Request $request): ?Request
    {
        if (! $this->nextHandler) {
            return null;
        }

        return $this->nextHandler->handle($request);
    }

    /**
     * @param BasicHandlerInterface $handler
     */
    public function setNext(BasicHandlerInterface $handler): void
    {
        $this->nextHandler = $handler;
    }
}