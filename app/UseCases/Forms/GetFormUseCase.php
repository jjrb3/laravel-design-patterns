<?php

namespace App\UseCases\Forms;

use App\UseCases\Forms\Countries\EnrollmentPortugal;
use App\UseCases\Forms\Countries\EnrollmentSpain;
use App\UseCases\Forms\Exceptions\GetFormException;
use App\UseCases\Forms\Interfaces\GetFormUseCaseInterface;

/**
 * Class GetFormUseCase
 * @package App\UseCases\Forms
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class GetFormUseCase implements GetFormUseCaseInterface
{
    /**
     * @var string
     */
    public const PORTUGAL_COUNTRY = 'PORTUGAL';

    /**
     * @var string
     */
    public const SPAIN_COUNTRY = 'SPAIN';

    /**
     * @var array
     */
    private const COUNTRIES = [
        self::PORTUGAL_COUNTRY,
        self::SPAIN_COUNTRY
    ];

    /**
     * @var string
     */
    public const HTML_IMPLEMENTATION = 'HTML';

    /**
     * @var string
     */
    public const APPLE_IMPLEMENTATION = 'APPLE';

    /**
     * @param string $country
     * @param string $implementation
     * @return string
     * @throws GetFormException
     */
    public function handle(string $country, string $implementation): string
    {
        if (!in_array($country, self::COUNTRIES)) {
            throw new GetFormException('Invalid country');
        }

        $implement = $implementation === self::HTML_IMPLEMENTATION ? new HtmlFormUseCase() : new AppleFormUseCase();

        $form = $country === self::SPAIN_COUNTRY
            ? new EnrollmentSpain($implement)
            : new EnrollmentPortugal($implement);

        $form->show();

        if ($form->adminArea()) {
            return $form->generateDocument();
        }

        throw new GetFormException('Empty form');
    }
}