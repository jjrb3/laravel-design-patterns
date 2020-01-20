<?php

namespace App\UseCases\MarkdownFormat;

use App\UseCases\MarkdownFormat\Interfaces\InputFormatUseCaseInterface;

/**
 * Class TextFormatUseCase
 * @package App\UseCases\MarkdownFormat
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class TextFormatUseCase implements InputFormatUseCaseInterface
{
    /**
     * @var InputFormatUseCaseInterface
     */
    protected $inputFormat;

    /**
     * TextFormatUseCase constructor.
     * @param InputFormatUseCaseInterface $inputFormat
     */
    public function __construct(InputFormatUseCaseInterface $inputFormat)
    {
        $this->inputFormat = $inputFormat;
    }

    /**
     * @param string $text
     * @return string
     */
    public function formatText(string $text): string
    {
        return $this->inputFormat->formatText($text);
    }
}