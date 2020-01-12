<?php

namespace App\UseCases\ManageDocuments\Interfaces;

use App\UseCases\ManageDocuments\DocumentsHtmlUseCase;

/**
 * Interface DocumentsUseCaseInterface
 * @package App\UseCases\ManageDocuments\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface DocumentsUseCaseInterface
{
    /**
     * @param string $content
     * @return DocumentsHtmlUseCase
     */
    public function setContent(string $content): void;

    /**
     * @return string
     */
    public function draw(): string;

    /**
     * @return string
     */
    public function print(): string;
}