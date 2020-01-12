<?php

namespace App\Components;

use Illuminate\Support\Facades\Log;

/**
 * Class PdfComponent
 * @package App\Components
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class PdfComponent
{
    /**
     * @var string
     */
    protected $content = '';

    /**
     * @var string
     */
    protected $format = '';

    /**
     * @param string $content
     * @return PdfComponent
     */
    public function pdfSetContent(string $content): PdfComponent
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return void
     */
    public function addFormat(): void
    {
        $this->format = 'PDF - ';
    }

    /**
     * @return string
     */
    public function drawPdf(): string
    {
        return "{$this->format}DRAW: {$this->content}";
    }

    /**
     * @return string
     */
    public function printPdf(): string
    {
        return "{$this->format}PRINT: {$this->content}";
    }
}