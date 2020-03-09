<?php

namespace App\Handlers;

use App\Handlers\Abstracts\BasicAbstractHandler;
use Illuminate\Http\Request;
use Exception;

/**
 * Class ValidateUserEmailHandler
 * @package App\Handlers
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class ValidateUserEmailHandler extends BasicAbstractHandler
{
    /**
     * @var string
     */
    private const EMAIL_REGEX = '/@.+\./';

    /**
     * @param Request $request
     * @return Request|null
     * @throws Exception
     */
    public function handle(Request $request): ?Request
    {
        if (! $request->filled('email')) {
            throw new Exception('The email address is required');
        }

        if (! preg_match(self::EMAIL_REGEX, $request->input('email'))) {
            throw new Exception('The email address is invalid');
        }

        return parent::handle($request);
    }
}