<?php

namespace App\UseCases\ProductForm\Components;

use App\UseCases\ProductForm\Abstracts\FormElementAbstract;

/**
 * Class InputUseCase
 * @package App\UseCases\ProductForm\Components
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class InputUseCase extends FormElementAbstract
{
    /**
     * @var string
     */
    private $type = '';

    /**
     * InputUseCase constructor.
     * @param string $name
     * @param string $title
     * @param string $type
     */
    public function __construct(string $name, string $title, string $type)
    {
        parent::__construct($name, $title);
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return "<label for=\"{$this->name}\">{$this->title}</label>\n" .
            "<input name=\"{$this->name}\" type=\"{$this->type}\" value=\"{$this->data}\">\n";
    }
}