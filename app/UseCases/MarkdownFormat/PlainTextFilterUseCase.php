<?php

namespace App\UseCases\MarkdownFormat;

/**
 * Class PlainTextFilterUseCase
 * @package App\UseCases\MarkdownFormat
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class PlainTextFilterUseCase extends TextFormatUseCase
{
    /**
     * @param string $text
     * @return string
     */
    public function formatText(string $text): string
    {
        $text = parent::formatText($text);
        return strip_tags($text);
    }
}