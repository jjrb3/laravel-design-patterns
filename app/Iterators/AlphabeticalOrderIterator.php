<?php
namespace App\Iterators;

use App\UseCases\Words\WordsCollectionUseCase;
use Iterator;

/**
 * Class AlphabeticalOrderIterator
 * @package App\Iterators
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class AlphabeticalOrderIterator implements Iterator
{
    /**
     * @var WordsCollectionUseCase
     */
    private $collection;

    /**
     * @var int
     */
    private $position = 0;

    /**
     * @var bool
     */
    private $reverse = false;

    /**
     * AlphabeticalOrderIterator constructor.
     * @param WordsCollectionUseCase $collection
     * @param bool $reverse
     */
    public function __construct(WordsCollectionUseCase $collection, bool $reverse = false)
    {
        $this->collection = $collection;
        $this->reverse = $reverse;
    }

    /**
     * @return void
     */
    public function rewind(): void
    {
        $this->position = $this->reverse ? count($this->collection->getWords()) -1  : 0;
    }

    /**
     * @return string
     */
    public function current(): string
    {
        return $this->collection->getWords()[$this->position];
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * @return void
     */
    public function next(): void
    {
        $this->position = $this->position + ($this->reverse ? -1 : 1);
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->collection->getWords()[$this->position]);
    }
}