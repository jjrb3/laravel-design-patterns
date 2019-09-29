<?php


namespace App\Prototypes;


use App\Prototypes\Abstracts\BookPrototypeAbstract;

/**
 * Class PHPBookPrototype
 * @package App\Prototypes
 */
class SQLBookPrototype extends BookPrototypeAbstract
{
    /**
     * PHPBookPrototype constructor.
     */
    function __construct() {
        $this->topic = 'SQL';
    }

    /**
     * @return mixed|void
     */
    function __clone() { }
}