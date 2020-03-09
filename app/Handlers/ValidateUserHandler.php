<?php

namespace App\Handlers;

use App\Handlers\Abstracts\BasicAbstractHandler;
use Exception;
use Illuminate\Http\Request;

/**
 * Class ValidateUserAgeHandler
 * @package App\Handlers
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class ValidateUserHandler extends BasicAbstractHandler
{
    /**
     * @var int
     */
    private const USERNAME_MAXLENGTH = 20;

    /**
     * @var int
     */
    private const FULL_NAME_MAXLENGTH = 30;

    /**
     * @param Request $request
     * @return Request|null
     * @throws Exception
     */
    public function handle(Request $request): ?Request
    {
        if (! $request->filled('full_name')) {
            throw new Exception('The full name is required');
        }

        if (! $request->filled('username')) {
            throw new Exception('The username is required');
        }

        if (strlen($request->input('full_name')) > self::FULL_NAME_MAXLENGTH) {
            throw new Exception('The full name is very long');
        }

        if (strlen($request->input('username')) > self::USERNAME_MAXLENGTH) {
            throw new Exception('The username is very long');
        }

        return parent::handle($request);
    }
}