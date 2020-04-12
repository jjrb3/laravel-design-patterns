<?php

namespace App\Commands;

use App\Commands\Abstracts\ControlCommandAbstract;

/**
 * Class InformationZoneCommand
 * @package App\Commands
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class InformationZoneCommand extends ControlCommandAbstract
{
    /**
     * InformationZoneCommand constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function inform(): string
    {
        $this->modify();

        return $this->result;
    }
}