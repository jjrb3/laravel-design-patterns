<?php

namespace App\UseCases\ProductForm;

use App\UseCases\ProductForm\Abstracts\FormElementAbstract;
use App\UseCases\ProductForm\Components\InputUseCase;
use App\UseCases\ProductForm\Exceptions\GetProductFormException;
use App\UseCases\ProductForm\Interfaces\GetProductFormUseCaseInterface;

/**
 * Class GetProductFormUseCase
 * @package App\UseCases\ProductForm
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class GetProductFormUseCase implements GetProductFormUseCaseInterface
{
    /**
     * @param array $formParameters
     * @return string
     */
    public function handle(array $formParameters): string
    {
        $form = $this->getProductForm($formParameters);
        $form->setData($formParameters['data']);

        return $form->render();
    }

    /**
     * @param array $formParameters
     * @return FormElementAbstract
     */
    private function getProductForm(array $formParameters): FormElementAbstract
    {
        $form = $formParameters['form'];
        $inputs = $form['inputs'];
        $fieldset = $formParameters['fieldset'];

        $formUseCase = new FormUseCase($form['name'], $form['title'], $form['url']);

        foreach ($inputs as $input) {
            $formUseCase->add(new InputUseCase($input['name'], $input['title'], $input['type']));
            $formUseCase->add(new InputUseCase($input['name'], $input['title'], $input['type']));
        }

        $picture = new FieldSetUseCase($fieldset['name'], $fieldset['title']);

        foreach ($fieldset['inputs'] as $input) {
            $picture->add(new InputUseCase($input['name'], $input['title'], $input['type']));
            $picture->add(new InputUseCase($input['name'], $input['title'], $input['type']));
        }

        $formUseCase->add($picture);

        return $formUseCase;
    }

    /**
     * @param array $formParameters
     * @throws GetProductFormException
     */
    private function checkInformation(array $formParameters): void
    {
        if (empty($formParameters['form'])) {
            throw new GetProductFormException('Form not found.');
        }

        if (empty($formParameters['fieldset'])) {
            throw new GetProductFormException('Fieldset not found.');
        }

        if (empty($formParameters['data'])) {
            throw new GetProductFormException('Data not found.');
        }
    }
}