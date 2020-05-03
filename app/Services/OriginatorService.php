<?php

namespace App\Services;

use App\Mementos\ConcreteMemento;

/**
 * Class OriginatorCommand
 * @package App\Commands
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class OriginatorService
{
    /**
     * @var string
     */
    private $state = '';

    /**
     * @var string
     */
    private $hexadecimal = '';

    /**
     * OriginatorCommand constructor.
     * @param string $state
     */
    public function __construct(string $state)
    {
        $this->state = $state;
        $this->hexadecimal = sprintf(
            '%s%s',
            implode('', range('A', 'Z')),
            implode('', range('0', '9'))
        );
    }

    /**
     * The Originator's business logic may affect its internal state. Therefore,
     * the client should backup the state before launching methods of the
     * business logic via the save() method.
     */
    public function doSomething(): void
    {
        $this->state = $this->generateRandomString(30);
    }

    /**
     * @param int $length
     * @return string
     */
    private function generateRandomString(int $length = 10): string
    {
        return substr(
            str_shuffle(
                str_repeat(
                    $this->hexadecimal,
                    ceil($length / strlen($this->hexadecimal))
                )
            ),
            1,
            $length,
            );
    }

    /**
     * Saves the current state inside a memento.
     *
     * @return ConcreteMemento
     */
    public function save(): ConcreteMemento
    {
        return new ConcreteMemento($this->state);
    }

    /**
     * Restores the Originator's state from a memento object.
     *
     * @param ConcreteMemento $memento
     */
    public function restore(ConcreteMemento $memento): void
    {
        $this->state = $memento->getState();
    }
}