<?php

namespace App\UseCases\Forms\Countries;

use App\UseCases\Forms\Abstracts\EnrollmentFormAbstract;
use App\UseCases\Forms\Interfaces\ImplementationUseCaseInterface;

/**
 * Class EnrollmentSpain
 * @package App\UseCases\Forms\Countries
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class EnrollmentSpain extends EnrollmentFormAbstract
{
    /**
     * @var int
     */
    private const CHARACTER_NUMBER = 7;

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
        return strpos($enrollment, $this->enrollment) !== false;
    }

    /**
     * @return string
     */
    protected function getLimit(): string
    {
        $this->enrollment = strtoupper(
            substr(
                md5(self::CHARACTER_NUMBER), 0, self::CHARACTER_NUMBER - 1
            )
        );

        return $this->enrollment;
    }
}