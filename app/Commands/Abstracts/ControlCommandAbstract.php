<?php

namespace App\Commands\Abstracts;

use App\Mediators\FormMediator;

/**
 * Class ControlCommandAbstract
 * @package App\Commands\Abstracts
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
abstract class ControlCommandAbstract
{
    /**
     * @var string
     */
    public $result = '';

    /**
     * @var string
     */
    protected $value = '';

    /**
     * @var FormMediator
     */
    protected $director;

    /**
     * @var string
     */
    protected $name;

    /**
     * ControlCommandAbstract constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ControlCommandAbstract
     */
    protected function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return FormMediator
     */
    public function getDirector(): FormMediator
    {
        return $this->director;
    }

    /**
     * @param FormMediator $form
     * @return ControlCommandAbstract
     */
    public function setDirector(FormMediator $form): self
    {
        $this->director = $form;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return ControlCommandAbstract
     */
    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    public abstract function inform(): string ;


    protected function modify(): void
    {
        $this->result = $this->getDirector()->modifyControl($this);
    }
}