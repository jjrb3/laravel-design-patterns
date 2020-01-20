<?php

namespace App\UseCases\MarkdownFormat;

use App\UseCases\MarkdownFormat\Interfaces\DisplayCommentAsAWebsiteUseCaseInterface;
use App\UseCases\MarkdownFormat\Interfaces\InputFormatUseCaseInterface;

/**
 * Class displayCommentAsAWebsiteUseCase
 * @package App\UseCases\MarkdownFormat
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class DisplayCommentAsAWebsiteUseCase implements DisplayCommentAsAWebsiteUseCaseInterface
{
    /**
     * @var string
     */
    public const TEXT_INPUT = 'TEXT_INPUT';

    /**
     * @var string
     */
    public const PLAIN_TEXT_FILTER = 'PLAIN_TEXT_FILTER';

    /**
     * @var string
     */
    public const MARKDOWN_FORMAT = 'MARKDOWN_FORMAT';

    /**
     * @param string $type
     * @param string $html
     * @return string
     */
    public function handle(string $type, string $html): string
    {
        switch ($type) {
            case self::TEXT_INPUT:
                $nativeInput = new TextInputUseCase();
                return $this->displayCommentAsAWebsite($nativeInput, $html);
                break;
            case self::PLAIN_TEXT_FILTER:
                $nativeInput = new TextInputUseCase();
                $filteredInput = new PlainTextFilterUseCase($nativeInput);
                return $this->displayCommentAsAWebsite($filteredInput, $html);
                break;
            case self::MARKDOWN_FORMAT:
                $nativeInput = new TextInputUseCase();
                $markdown = new MarkdownFormatUseCase($nativeInput);
                $filteredInput = new DangerousHTMLTagsFilterUseCase($markdown);
                return $this->displayCommentAsAWebsite($filteredInput, $html);
                break;
            default:
                return '';
                break;
        }
    }

    /**
     * @param InputFormatUseCaseInterface $format
     * @param string $text
     * @return string
     */
    function displayCommentAsAWebsite(InputFormatUseCaseInterface $format, string $text): string
    {
        return $format->formatText($text);
    }
}