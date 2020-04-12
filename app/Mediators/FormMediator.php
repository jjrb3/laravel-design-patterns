<?php

namespace App\Mediators;

use App\Commands\Abstracts\ControlCommandAbstract;
use App\Commands\ButtonCommand;
use App\Commands\PopupMenuCommand;

/**
 * Class FormMediator
 * @package App\Mediators
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class FormMediator
{
    /**
     * @var array
     */
    protected $controls = [];

    /**
     * @var array
     */
    protected $coMonetaryControls = [];

    /**
     * @var
     */
    protected $coMonetaryMenu;

    /**
     * @var
     */
    protected $button;

    /**
     * @var bool
     */
    protected $inProgress = true;

    /**
     * @var string
     */
    private $description = '';

    /**
     * @param ControlCommandAbstract $control
     * @return FormMediator
     */
    public function addControl(ControlCommandAbstract $control): self
    {
        $this->controls[] = $control;
        $control->setDirector($this);
        return $this;
    }

    /**
     * @param ControlCommandAbstract $control
     * @return FormMediator
     */
    public function addCoMonetaryControl(ControlCommandAbstract $control): self
    {
        $this->controls[] = $control;
        $control->setDirector($this);
        return $this;
    }

    /**
     * @param PopupMenuCommand $coMonetaryMenu
     * @return FormMediator
     */
    public function setMenuCoMonetary(PopupMenuCommand $coMonetaryMenu): self
    {
        $this->coMonetaryMenu = $coMonetaryMenu;
        return $this;
    }

    /**
     * @param ButtonCommand $button
     * @return FormMediator
     */
    public function setButton(ButtonCommand $button): self
    {
        $this->button = $button;
        return $this;
    }

    /**
     * @param ControlCommandAbstract $control
     * @return string
     */
    public function modifyControl(ControlCommandAbstract $control): string
    {
        return $control->getName();
    }

    /**
     * @return array
     */
    public function notify(): array
    {
        $result = [];

        /* @var ControlCommandAbstract $control*/
        foreach ($this->controls as $control) {
            $result[] = $control->inform();
        }

        return $result;
    }
}