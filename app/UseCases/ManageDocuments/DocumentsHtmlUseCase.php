<?php

namespace App\UseCases\ManageDocuments;

use App\UseCases\ManageDocuments\Exceptions\DocumentHtmlException;
use App\UseCases\ManageDocuments\Interfaces\DocumentsUseCaseInterface;

/**
 * Class DocumentsHtmlUseCase
 * @package App\UseCases\ManageDocuments
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class DocumentsHtmlUseCase implements DocumentsUseCaseInterface
{
    /**
     * @var string
     */
    private $content = '';

    /**
     * @param string $content
     * @return DocumentsHtmlUseCase
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     * @throws DocumentHtmlException
     */
    public function draw(): string
    {
        if (!$this->content) {
            throw new DocumentHtmlException('Empty content in draw document HTML');
        }

        return $this->content = "HTML - DRAW: {$this->content}";
    }

    /**
     * @return string
     * @throws DocumentHtmlException
     */
    public function print(): string
    {
        if (!$this->content) {
            throw new DocumentHtmlException('Empty content in print document HTML');
        }

        return "HTML - PRINT: {$this->content}";
    }
}