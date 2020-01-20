<?php

namespace App\UseCases\MarkdownFormat;

/**
 * Class MarkdownFormatUseCase
 * @package App\UseCases\MarkdownFormat
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class MarkdownFormatUseCase extends TextFormatUseCase
{
    /**
     * @param string $text
     * @return string
     */
    public function formatText(string $text): string
    {
        $text = parent::formatText($text);

        // Format block elements.
        $chunks = preg_split('|\n\n|', $text);

        foreach ($chunks as &$chunk) {
            // Format headers.
            if (preg_match('|^#+|', $chunk)) {
                $chunk = preg_replace_callback('|^(#+)(.*?)$|', function ($matches) {
                    $h = strlen($matches[1]);
                    return "<h{$h}>" . trim($matches[2]) . "</h{$h}>";
                }, $chunk);
            } else { // Format paragraphs.
                $chunk = "<p>{$chunk}</p>";
            }
        }
        $text = implode("\n\n", $chunks);

        // Format inline elements.
        $text = preg_replace("|__(.*?)__|", '<strong>$1</strong>', $text);
        $text = preg_replace("|\*\*(.*?)\*\*|", '<strong>$1</strong>', $text);
        $text = preg_replace("|_(.*?)_|", '<em>$1</em>', $text);
        $text = preg_replace("|\*(.*?)\*|", '<em>$1</em>', $text);

        return $text;
    }
}