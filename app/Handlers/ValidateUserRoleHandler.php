<?php

namespace App\Handlers;

use App\Handlers\Abstracts\BasicAbstractHandler;
use Exception;
use Illuminate\Http\Request;

/**
 * Class ValidateUserRoleHandler
 * @package App\Handlers
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class ValidateUserRoleHandler extends BasicAbstractHandler
{
    /**
     * @var string
     */
    private const ADMIN_ROLE = 'ADMIN';

    /**
     * @var string
     */
    private const USER_ROLE = 'USER';

    /**
     * @var array
     */
    private const ROLES = [
        1 => self::ADMIN_ROLE,
        2 => self::USER_ROLE,
    ];

    /**
     * @param Request $request
     * @return Request|null
     * @throws Exception
     */
    public function handle(Request $request): ?Request
    {
        if (! $request->filled('role_id')) {
            throw new Exception('The rol is required');
        }

        if (empty(self::ROLES[$request->input('role_id')])) {
            throw new Exception('Not found role');
        }

        $info = $request->all();
        $info['role_name'] = self::ROLES[$request->input('role_id')];

        $request->replace($info);

        return parent::handle($request);
    }
}