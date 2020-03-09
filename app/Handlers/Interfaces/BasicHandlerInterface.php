<?php

namespace App\Handlers\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface HandlerInterface
 * @package App\Handlers\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface BasicHandlerInterface
{
    /**
     * @param Request $request
     * @return Request|null
     */
    public function handle(Request $request): ?Request;

    /**
     * @param BasicHandlerInterface $handler
     */
    public function setNext(BasicHandlerInterface $handler): void;
}