<?php

namespace App\Handlers;

use App\Handlers\Abstracts\BasicAbstractHandler;
use Exception;
use Illuminate\Http\Request;

/**
 * Class ValidateCityHandler
 * @package App\Handlers
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class ValidateCityHandler extends BasicAbstractHandler
{
    /**
     * @var string
     */
    private const BOGOTA_CITY = 'BOGOTA';

    /**
     * @var string
     */
    private const BARRANQUILLA_CITY = 'BARRANQUILLA';

    /**
     * @var array
     */
    private const CITIES = [
        1 => self::BOGOTA_CITY,
        2 => self::BARRANQUILLA_CITY,
    ];

    /**
     * @param Request $request
     * @return Request|null
     * @throws Exception
     */
    public function handle(Request $request): ?Request
    {
        if (! $request->filled('city_id')) {
            throw new Exception('The city is required');
        }

        if (empty(self::CITIES[$request->input('city_id')])) {
            throw new Exception('Not found role');
        }

        $info = $request->all();
        $info['city_name'] = self::CITIES[$request->input('city_id')];

        $request->replace($info);

        return parent::handle($request);
    }
}