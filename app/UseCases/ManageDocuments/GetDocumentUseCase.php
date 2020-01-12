<?php

namespace App\UseCases\ManageDocuments;

use App\UseCases\ManageDocuments\Exceptions\GetDocumentException;
use App\UseCases\ManageDocuments\Interfaces\GetDocumentUseCaseInterface;

/**
 * Class GetDocumentUseCase
 * @package App\UseCases\ManageDocuments
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class GetDocumentUseCase implements GetDocumentUseCaseInterface
{
    /**
     * @var string
     */
    public const DRAW_TYPE = 'DRAW';

    /**
     * @var string
     */
    public const PRINT_TYPE = 'PRINT';

    /**
     * @var string
     */
    public const PDF_FORMAT = 'PDF';

    /**
     * @var string
     */
    public const HTML_FORMAT = 'HTML';

    /**
     * @var array
     */
    private const FORMATS = [
        self::PDF_FORMAT,
        self::HTML_FORMAT
    ];

    /**
     * @var DocumentsHtmlUseCase
     */
    private $documentsHtmlUseCase;

    /**
     * @var DocumentsPdfUseCase
     */
    private $documentsPdfUseCase;

    /**
     * GetDocumentUseCase constructor.
     * @param DocumentsHtmlUseCase $documentsHtmlUseCase
     * @param DocumentsPdfUseCase $documentsPdfUseCase
     */
    public function __construct(DocumentsHtmlUseCase $documentsHtmlUseCase, DocumentsPdfUseCase $documentsPdfUseCase)
    {
        $this->documentsHtmlUseCase = $documentsHtmlUseCase;
        $this->documentsPdfUseCase = $documentsPdfUseCase;
    }

    /**
     * @param string $content
     * @param string $type
     * @param string $format
     * @return string
     * @throws Exceptions\DocumentHtmlException
     * @throws GetDocumentException
     */
    public function handle(string $content, string $type, string $format): string
    {
        if (!in_array($format, self::FORMATS)) {
            throw new GetDocumentException('Wrong format');
        }

        $documentFormat = $format === self::HTML_FORMAT ? $this->documentsHtmlUseCase : $this->documentsPdfUseCase;
        $documentFormat->setContent($content);

        if ($type === self::DRAW_TYPE) {
            return $documentFormat->draw();
        }

        if ($type === self::PRINT_TYPE) {
            return $documentFormat->print();
        }

        throw new GetDocumentException('Wrong type');
    }
}