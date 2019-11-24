<?php
namespace App\Builders\Abstracts;

use App\Builders\DocumentationBuilder;
use ReflectionClass;
use ReflectionMethod;
use stdClass;

/**
 * Class DocumentationBuilderAbstract
 *
 * @package App\Builders\Abstracts
 */
abstract class DocumentationBuilderAbstract
{
	/**
	 * @var string
	 */
	private $documentation;

	/**
	 * @var string
	 */
	protected $type;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $email;

	/**
	 * DocumentationBuilderAbstract constructor.
	 */
	public function __construct()
	{
		$this->documentation = new stdClass();
	}

	/**
	 * @return string
	 */
	public abstract function getType(): string;

	/**
	 * @param int $
	 *
	 * @return DocumentationBuilder
	 */
	public abstract function setType(?int $type): DocumentationBuilder;

	/**
	 * @return string
	 */
	public abstract function getName(): string;

	/**
	 * @param string|null $type
	 *
	 * @return DocumentationBuilder
	 */
	public abstract function setName(string $name): DocumentationBuilder;

	/**
	 * @return string
	 */
	public abstract function getEmail(): string;

	/**
	 * @param string|null $email
	 *
	 * @return DocumentationBuilder
	 */
	public abstract function setEmail(?string $email): DocumentationBuilder;

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get(): string
	{
		$documentationClass = new ReflectionClass($this);
		foreach ($documentationClass->getMethods(ReflectionMethod::IS_PRIVATE) as $method) {
			$this->{$method->name}();
		}

		return $this->documentation;
	}

	/**
	 * Create head document
	 */
	private function buildHead(): void
	{
		$this->documentation = "Name: {$this->name}";
	}

	/**
	 * Create body document
	 */
	private function buildBody(): void
	{
		$this->documentation .= "\n\nEste documento es de ejemplo en formato {$this->type}";
	}

	/**
	 * Create footer document
	 */
	private function buildFooter(): void
	{
		if (!empty($this->email)) {
			$this->documentation .= "\n\nEmail: {$this->email}";
		}
	}
}