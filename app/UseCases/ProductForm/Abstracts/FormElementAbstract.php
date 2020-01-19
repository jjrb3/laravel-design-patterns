<?php

namespace App\UseCases\ProductForm\Abstracts;

/**
 * Class FormElement
 * @package App\UseCases\ProductForm\Abstracts
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
abstract class FormElementAbstract
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var mixed
     */
    protected $data;

    /**
     * FormElement constructor.
     * @param string $name
     * @param string $title
     */
    public function __construct(string $name, string $title)
    {
        $this->name = $name;
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param $data mixed
     * @return FormElementAbstract
     */
    public function setData($data): FormElementAbstract
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return string
     */
    abstract public function render(): string;
}