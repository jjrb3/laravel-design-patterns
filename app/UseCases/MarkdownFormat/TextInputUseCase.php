<?php

namespace App\UseCases\MarkdownFormat;

use App\UseCases\MarkdownFormat\Interfaces\InputFormatUseCaseInterface;

/**
 * Class TextInputUseCase
 * @package App\UseCases\MarkdownFormat
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class TextInputUseCase implements InputFormatUseCaseInterface
{
    /**
     * @param string $text
     * @return string
     */
    public function formatText(string $text): string
    {
        return $text;
    }
}