<?php

namespace App\UseCases\Forms;

use App\UseCases\Forms\Exceptions\HtmlFormException;
use App\UseCases\Forms\Interfaces\ImplementationUseCaseInterface;

/**
 * Class HtmlFormUseCase
 * @package App\UseCases\Forms
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class HtmlFormUseCase implements ImplementationUseCaseInterface
{
    /**
     * @var string
     */
    private $text = '';

    /**
     * @param string $text
     * @throws HtmlFormException
     */
    public function drawText(string $text): void
    {
        if (!$text) {
            throw new HtmlFormException('Empty text in HtmlForm');
        }

        $this->text .= "HTML: {$text}\n";
    }

    /**
     * @return string
     */
    public function manageIndicatedArea(): string
    {
        return $this->text;
    }
}