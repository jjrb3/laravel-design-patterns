<?php

namespace App\Http\Controllers\Creational;


use App\Builders\DocumentationBuilder;

/**
 * Class AbstractFactoryController
 * @package App\Http\Controllers
 */
class BuilderController
{
    /**
     * @var DocumentationBuilder
     */
    private $documentationBuilder;

    /**
     * BuilderController constructor.
     * @param DocumentationBuilder $documentationBuilder
     */
    public function __construct(DocumentationBuilder $documentationBuilder)
    {
        $this->documentationBuilder = $documentationBuilder;
    }

    /**
     * @param int $type
     * @param string $name
     * @param string $email
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDocumentation(int $type, string $name, string $email)
    {
        $documentation = ($this->documentationBuilder)
            ->setType($type)
            ->setName($name)
            ->setEmail($email)
            ->get();

        return response()->json([
            'documentation' => $documentation
        ]);
    }
}