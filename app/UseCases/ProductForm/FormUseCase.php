<?php

namespace App\UseCases\ProductForm;

use App\UseCases\ProductForm\Abstracts\FieldCompositeAbstract;

/**
 * Class FormUseCase
 * @package App\UseCases\ProductForm
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class FormUseCase extends FieldCompositeAbstract
{
    /**
     * @var string
     */
    protected $url = '';

    /**
     * FormUseCase constructor.
     * @param string $name
     * @param string $title
     * @param string $url
     */
    public function __construct(string $name, string $title, string $url)
    {
        parent::__construct($name, $title);
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $output = parent::render();
        return "<form action=\"{$this->url}\">\n<h3>{$this->title}</h3>\n$output</form>\n";
    }
}