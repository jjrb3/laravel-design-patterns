<?php

namespace App\Commands;

use App\Commands\Abstracts\ControlCommandAbstract;

/**
 * Class PopupMenuCommand
 * @package App\Commands
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class PopupMenuCommand extends ControlCommandAbstract
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * PopupMenuCommand constructor.
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

    /**
     * @param string $option
     * @return PopupMenuCommand
     */
    public function addOption(string $option): self
    {
        $this->options[] = $option;
        return $this;
    }
}