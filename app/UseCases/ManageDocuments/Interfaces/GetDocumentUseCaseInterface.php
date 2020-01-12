<?php

namespace App\UseCases\ManageDocuments\Interfaces;

/**
 * Interface GetDocumentUseCaseInterface
 * @package App\UseCases\ManageDocuments\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface GetDocumentUseCaseInterface
{
    /**
     * @param string $content
     * @param string $type
     * @param string $format
     * @return string
     */
    public function handle(string $content, string $type, string $format): string;
}