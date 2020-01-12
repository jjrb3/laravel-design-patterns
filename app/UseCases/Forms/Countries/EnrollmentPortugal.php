<?php

namespace App\UseCases\Forms\Countries;

use App\UseCases\Forms\Abstracts\EnrollmentFormAbstract;
use App\UseCases\Forms\Interfaces\ImplementationUseCaseInterface;

/**
 * Class EnrollmentSpain
 * @package App\UseCases\Forms\Countries
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class EnrollmentPortugal extends EnrollmentFormAbstract
{
    /**
     * @var int
     */
    private const CHARACTER_NUMBER = 6;

    /**
     * EnrollmentSpain constructor.
     * @param ImplementationUseCaseInterface $implementationUseCase
     */
    public function __construct(ImplementationUseCaseInterface $implementationUseCase)
    {
        parent::__construct($implementationUseCase);
    }

    /**
     * @param string $enrollment
     * @return bool
     */
    protected function areaControl(string $enrollment): bool
    {
        return strlen($enrollment) === self::CHARACTER_NUMBER;
    }

    /**
     * @return string
     */
    protected function getLimit(): string
    {
        return self::CHARACTER_NUMBER . ' car.';
    }
}