<?php

namespace App\UseCases\ManageDocuments;

use App\Components\PdfComponent;
use App\UseCases\ManageDocuments\Interfaces\DocumentsUseCaseInterface;

/**
 * Class DocumentsPdfUseCase
 * @package App\UseCases\ManageDocuments
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class DocumentsPdfUseCase implements DocumentsUseCaseInterface
{
    /**
     * @var PdfComponent
     */
    private $pdfComponent;

    /**
     * DocumentsPdfUseCase constructor.
     * @param PdfComponent $pdfComponent
     */
    public function __construct(PdfComponent $pdfComponent)
    {
        $this->pdfComponent = $pdfComponent;
    }

    /**
     * @param string $content
     * @return DocumentsHtmlUseCase
     */
    public function setContent(string $content): void
    {
        $this->pdfComponent->pdfSetContent($content);
    }

    /**
     * @return string
     */
    public function draw(): string
    {
        $this->pdfComponent->addFormat();

        return $this->pdfComponent->drawPdf();
    }

    /**
     * @return string
     */
    public function print(): string
    {
        $this->pdfComponent->addFormat();

        return $this->pdfComponent->printPdf();
    }
}