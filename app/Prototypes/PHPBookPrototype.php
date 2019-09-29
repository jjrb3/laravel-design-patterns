<?php


namespace App\Prototypes;


use App\Prototypes\Abstracts\BookPrototypeAbstract;

/**
 * Class PHPBookPrototype
 * @package App\Prototypes
 */
class PHPBookPrototype extends BookPrototypeAbstract
{
    /**
     * PHPBookPrototype constructor.
     */
    function __construct() {
        $this->topic = 'PHP';
    }

    /**
     * @return mixed|void
     */
    function __clone() { }
}