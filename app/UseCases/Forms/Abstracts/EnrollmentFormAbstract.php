<?php

namespace App\UseCases\Forms\Abstracts;

use App\UseCases\Forms\Interfaces\ImplementationUseCaseInterface;

/**
 * Class EnrollmentFormAbstract
 * @package App\UseCases\Abstracts
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
abstract class EnrollmentFormAbstract
{
    /**
     * @var string
     */
    protected $enrollment = '';

    /**
     * @var string
     */
    protected $content = '';

    /**
     * @var ImplementationUseCaseInterface
     */
    protected $implementation;

    /**
     * EnrollmentFormAbstract constructor.
     * @param ImplementationUseCaseInterface $implementationUseCase
     */
    public function __construct(ImplementationUseCaseInterface $implementationUseCase)
    {
        $this->implementation = $implementationUseCase;
    }

    public function show(): void
    {
        $this->implementation
            ->drawText("Existing enrollment number: {$this->getLimit()}");
    }

    /**
     * @return string
     */
    public function generateDocument(): string
    {
        $this->implementation
            ->drawText("Request enrollment");
        $this->implementation
            ->drawText("Enrollment number: {$this->enrollment}");

        return $this->implementation->manageIndicatedArea();
    }

    /**
     * @return bool
     */
    public function adminArea(): bool
    {
        $this->content = $this->implementation->manageIndicatedArea();

        return $this->areaControl($this->content);
    }

    /**
     * @param string $enrollment
     * @return bool
     */
    protected abstract function areaControl(string $enrollment): bool;

    /**
     * @return string
     */
    protected abstract function getLimit(): string;
}