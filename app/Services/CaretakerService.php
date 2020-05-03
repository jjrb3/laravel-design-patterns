<?php

namespace App\Services;

use Exception;

/**
 * Class CaretakerService
 * @package App\Commands
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class CaretakerService
{
    /**
     * @var array
     */
    private $mementos = [];

    /**
     * @var OriginatorService
     */
    private $originator;

    /**
     * CaretakerService constructor.
     * @param OriginatorService $originator
     */
    public function __construct(OriginatorService $originator)
    {
        $this->originator = $originator;
    }

    public function backup(): void
    {
        $this->mementos[] = $this->originator->save();
    }

    public function undo(): void
    {
        if (! count($this->mementos)) {
            return;
        }

        $memento = array_pop($this->mementos);

        try {
            $this->originator->restore($memento);
        } catch (Exception $e) {
            $this->undo();
        }
    }

    /**
     * @return array
     */
    public function showHistory(): array
    {
        return $this->mementos;
    }
}