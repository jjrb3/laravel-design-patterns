<?php

namespace App\UseCases\ProductForm;

use App\UseCases\ProductForm\Abstracts\FieldCompositeAbstract;

/**
 * Class FieldSetUseCase
 * @package App\UseCases\ProductForm
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class FieldSetUseCase extends FieldCompositeAbstract
{
    /**
     * @return string
     */
    public function render(): string
    {
        $output = parent::render();

        return "<fieldset><legend>{$this->title}</legend>\n$output</fieldset>\n";
    }
}