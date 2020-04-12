<?php
namespace App\UseCases\Words;

use App\Iterators\AlphabeticalOrderIterator;
use App\UseCases\Words\Interfaces\WordsCollectionUseCaseInterface;
use Iterator;

/**
 * Class WordsCollectionUseCase
 * @package App\UseCases\Words
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class WordsCollectionUseCase implements WordsCollectionUseCaseInterface
{
    /**
     * @var array
     */
    private $words = [];

    /**
     * @param string $word
     * @return WordsCollectionUseCase
     */
    public function setWord(string $word): self
    {
        $this->words[] = $word;
        return $this;
    }

    /**
     * @return array
     */
    public function getWords(): array
    {
        return $this->words;
    }

    /**
     * @return Iterator
     */
    public function getIterator(): Iterator
    {
        return new AlphabeticalOrderIterator($this);
    }

    /**
     * @return Iterator
     */
    public function getReverseIterator(): Iterator
    {
        return new AlphabeticalOrderIterator($this, true);
    }
}