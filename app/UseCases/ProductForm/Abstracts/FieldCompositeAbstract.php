<?php

namespace App\UseCases\ProductForm\Abstracts;

/**
 * Class FieldComposite
 * @package App\UseCases\ProductForm\Abstracts
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
abstract class FieldCompositeAbstract extends FormElementAbstract
{
    /**
     * @var array
     */
    protected $fields = [];

    /**
     * @param FormElementAbstract $field
     */
    public function add(FormElementAbstract $field): void
    {
        $name = $field->getName();
        $this->fields[$name] = $field;
    }

    /**
     * @param FormElementAbstract $component
     */
    public function remove(FormElementAbstract $component): void
    {
        $this->fields = array_filter($this->fields, function ($child) use ($component) {
            return $child !== $component;
        });
    }

    /**
     * @param mixed $data
     * @return FormElementAbstract
     */
    public function setData($data): FormElementAbstract
    {
        foreach ($this->fields as $name => $field) {
            if (isset($data[$name])) {
                $field->setData($data[$name]);
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $data = [];

        foreach ($this->fields as $name => $field) {
            $data[$name] = $field->getData();
        }

        return $data;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $output = '';

        foreach ($this->fields as $name => $field) {
            $output .= $field->render();
        }

        return $output;
    }
}