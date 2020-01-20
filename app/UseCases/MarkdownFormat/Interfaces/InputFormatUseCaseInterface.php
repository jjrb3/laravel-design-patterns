<?php

namespace App\UseCases\MarkdownFormat\Interfaces;

/**
 * Interface InputFormatUseCaseInterface
 * @package App\UseCases\MarkdownFormat\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface InputFormatUseCaseInterface
{
    /**
     * @param string $text
     * @return string
     */
    public function formatText(string $text): string;
}