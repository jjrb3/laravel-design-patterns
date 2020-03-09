<?php

namespace App\Handlers;

use App\Handlers\Abstracts\BasicAbstractHandler;
use Illuminate\Http\Request;

/**
 * Class ReturnRegisterHandler
 * @package App\Handlers
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class ReturnUserRegisterHandler extends BasicAbstractHandler
{
    /**
     * @param Request $request
     * @return Request|null
     */
    public function handle(Request $request): ?Request
    {
        $info = $request->all();

        unset($info['role_id']);
        unset($info['city_id']);


        $request->replace([
            'success' => true,
            'info' => $info
        ]);


        return $request;
    }
}