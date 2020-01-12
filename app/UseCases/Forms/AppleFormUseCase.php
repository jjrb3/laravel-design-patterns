<?php

namespace App\UseCases\Forms;

use App\UseCases\Forms\Exceptions\AppleFormException;
use App\UseCases\Forms\Interfaces\ImplementationUseCaseInterface;

/**
 * Class HtmlFormUseCase
 * @package App\UseCases\Forms
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class AppleFormUseCase implements ImplementationUseCaseInterface
{
    /**
     * @var string
     */
    private $text = '';

    /**
     * @param string $text
     * @throws AppleFormException
     */
    public function drawText(string $text): void
    {
        if (!$text) {
            throw new AppleFormException('Empty text in AppleForm');
        }

        $this->text .= "APPLE: {$text}\n";
    }

    /**
     * @return string
     */
    public function manageIndicatedArea(): string
    {
        return $this->text;
    }
}