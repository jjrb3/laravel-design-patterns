<?php


namespace App\Prototypes\Abstracts;

/**
 * Class BookPrototypeAbstract
 * @package App\Prototypes\Abstracts
 */
abstract class BookPrototypeAbstract
{
    /**
     * @var
     */
    protected $title;

    /**
     * @var
     */
    protected $topic;

    /**
     * @return mixed
     */
    abstract function __clone();

    /**
     * @return string
     */
    function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $titleIn
     */
    function setTitle(string $titleIn): void
    {
        $this->title = $titleIn;
    }

    /**
     * @return string
     */
    function getTopic(): string
    {
        return $this->topic;
    }
}