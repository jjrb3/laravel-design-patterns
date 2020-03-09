<?php

namespace App\Clients\Interfaces;

use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Interface HttpChainInterface
 * @package App\Clients\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface ChainResponsibilityInterface
{
    /**
     * @param array $handlers
     * @return array
     * @throws BindingResolutionException
     */
    public function run(array $handlers): ?iterable;
}