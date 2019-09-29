<?php


namespace App\Builders;


use App\Builders\Abstracts\DocumentationBuilderAbstract;

/**
 * Class DocumentationBuilder
 * @package App\Builders
 */
class DocumentationBuilder extends DocumentationBuilderAbstract
{
    /**
     * @var string
     */
    public const DOCUMENT_PDF = 1;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param int|null $type
     * @return DocumentationBuilder
     */
    public function setType(?int $type): DocumentationBuilder
    {
        $this->type = $type === self::DOCUMENT_PDF ? 'pdf' : 'word';
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return DocumentationBuilder
     */
    public function setEmail(?string $email): DocumentationBuilder
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return DocumentationBuilder
     */
    public function setName(string $name): DocumentationBuilder
    {
        $this->name = $name;
        return $this;
    }
}