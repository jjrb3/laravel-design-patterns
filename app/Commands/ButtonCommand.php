<?php

namespace App\Commands;

use App\Commands\Abstracts\ControlCommandAbstract;

/**
 * Class ButtonCommand
 * @package App\Commands
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class ButtonCommand extends ControlCommandAbstract
{
    /**
     * ButtonCommand constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function inform(): string
    {
        if (rand(0, 1)) {
            $this->modify();
        }

        return $this->result;
    }
}