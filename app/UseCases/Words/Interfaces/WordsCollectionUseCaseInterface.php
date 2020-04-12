<?php
namespace App\UseCases\Words\Interfaces;

use App\UseCases\Words\WordsCollectionUseCase;
use Iterator;

/**
 * Interface WordsCollectionUseCaseInterface
 * @package App\UseCases\Words\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface WordsCollectionUseCaseInterface
{
    /**
     * @param string $word
     * @return WordsCollectionUseCase
     */
    public function setWord(string $word): WordsCollectionUseCase;

    /**
     * @return array
     */
    public function getWords(): array;

    /**
     * @return Iterator
     */
    public function getIterator(): Iterator;

    /**
     * @return Iterator
     */
    public function getReverseIterator(): Iterator;
}