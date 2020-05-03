<?php

namespace App\Mementos;

use App\Mementos\Interfaces\MementoInterface;

/**
 * Class ConcreteMemento
 * @package App\Mementos
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class ConcreteMemento implements MementoInterface
{
    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $date;

    /**
     * ConcreteMemento constructor.
     * @param string $state
     */
    public function __construct(string $state)
    {
        $this->state = $state;
        $this->date = now()->toDateTimeString();
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->date . ' / (' . substr($this->state, 0, 9) . '...)';
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }
}