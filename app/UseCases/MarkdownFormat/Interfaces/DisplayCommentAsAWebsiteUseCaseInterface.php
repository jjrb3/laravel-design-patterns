<?php

namespace App\UseCases\MarkdownFormat\Interfaces;

/**
 * Interface DisplayCommentAsAWebsiteInterface
 * @package App\UseCases\MarkdownFormat\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface DisplayCommentAsAWebsiteUseCaseInterface
{
    /**
     * @param string $type
     * @param string $html
     * @return string
     */
    public function handle(string $type, string $html): string;
}