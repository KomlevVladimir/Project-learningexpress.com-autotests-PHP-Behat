<?php

namespace src\Elements;

use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use SensioLabs\Behat\PageObjectExtension\PageObject\Factory;
class ProxyElement
{
    /**
     * @var Element
     */
    protected $element;

    /**
     * Checkbox constructor
     * @param $element
     */
    public function __construct($element)
    {
        $this->element = $element;
    }

    /**
     * @return Element
     */
    public function getElement()
    {
        return $this->element;
    }
}