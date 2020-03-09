<?php

namespace App\Clients;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use App\Clients\Interfaces\ChainResponsibilityInterface;
use Illuminate\Http\Request;

/**
 * Class HttpChain
 * @package App\Clients
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class ChainResponsibility implements ChainResponsibilityInterface
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var Application
     */
    private $app;

    /**
     * HttpChain constructor.
     * @param Application $app
     * @param Request $request
     */
    public function __construct(Application $app, Request $request)
    {
        $this->request = $request;
        $this->app = $app;
    }

    /**
     * @param array $handlers
     * @return array
     * @throws BindingResolutionException
     */
    public function run(array $handlers): ?iterable
    {
        $totalHandlers = count($handlers);
        $list = [];

        for ($i = 0; $i < $totalHandlers; $i++) {
            $list[] = $this->app->make($handlers[$i]);
        }

        for ($i = 0; $i < $totalHandlers - 1; $i++) {
            $handler = $list[$i];
            $next = $list[$i + 1];

            $handler->setNext($next);
        }

        $handlerResult = array_shift($list)->handle($this->request);

        return empty($handlerResult) ? null : $handlerResult->all();
    }
}