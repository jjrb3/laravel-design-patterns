<?php

namespace Tests\Feature\app\Http\Controllers\Structural;

use App\Http\Controllers\Structural\AdapterController;
use App\UseCases\ManageDocuments\GetDocumentUseCase;
use Tests\TestCase;

/**
 * Class AdapterControllerTest
 * @package Tests\Feature\app\Http\Controllers\Structural
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class AdapterControllerTest extends TestCase
{
    /**
     * @var string
     */
    private const CONTENT = 'Jeremy Reyes B.';

    /**
     * @var AdapterController
     */
    private $adapterController;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adapterController = $this->app->make(AdapterController::class);
    }

    /**
     * Pdf format and draw
     *
     * @return void
     */
    public function testPdfFormatAndDraw()
    {
        $pdf = $this->adapterController->getDocument(
            self::CONTENT,
            GetDocumentUseCase::DRAW_TYPE,
            GetDocumentUseCase::PDF_FORMAT
        );

        $this->assertContains(self::CONTENT, $pdf->getContent());
        $this->assertContains(GetDocumentUseCase::PDF_FORMAT, $pdf->getContent());
        $this->assertContains(GetDocumentUseCase::DRAW_TYPE, $pdf->getContent());
    }

    /**
     * Html format and draw.
     *
     * @return void
     */
    public function testHtmlFormatAndDraw()
    {
        $pdf = $this->adapterController->getDocument(
            self::CONTENT,
            GetDocumentUseCase::DRAW_TYPE,
            GetDocumentUseCase::HTML_FORMAT
        );

        $this->assertContains(self::CONTENT, $pdf->getContent());
        $this->assertContains(GetDocumentUseCase::HTML_FORMAT, $pdf->getContent());
        $this->assertContains(GetDocumentUseCase::DRAW_TYPE, $pdf->getContent());
    }

    /**
     * Html format and print.
     *
     * @return void
     */
    public function testHtmlFormatAndPrint()
    {
        $pdf = $this->adapterController->getDocument(
            self::CONTENT,
            GetDocumentUseCase::PRINT_TYPE,
            GetDocumentUseCase::HTML_FORMAT
        );

        $this->assertContains(self::CONTENT, $pdf->getContent());
        $this->assertContains(GetDocumentUseCase::HTML_FORMAT, $pdf->getContent());
        $this->assertContains(GetDocumentUseCase::PRINT_TYPE, $pdf->getContent());
    }

    /**
     * Pdf format and print.
     *
     * @return void
     */
    public function testPdfFormatAndPrint()
    {
        $pdf = $this->adapterController->getDocument(
            self::CONTENT,
            GetDocumentUseCase::PRINT_TYPE,
            GetDocumentUseCase::PDF_FORMAT
        );

        $this->assertContains(self::CONTENT, $pdf->getContent());
        $this->assertContains(GetDocumentUseCase::PDF_FORMAT, $pdf->getContent());
        $this->assertContains(GetDocumentUseCase::PRINT_TYPE, $pdf->getContent());
    }
}
