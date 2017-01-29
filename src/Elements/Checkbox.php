<?php

namespace src\Elements;

use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use SensioLabs\Behat\PageObjectExtension\PageObject\Factory;
class Checkbox extends ProxyElement
{
    /**
     * @param $val
     * @return @this
     * @throws \Behat\Mink\Exception\ElementException
     */
    public function setValue($val)
    {
        if ($val) {
            $this->getElement()->check();
        } else
            $this->getElement()->uncheck();

        return $this;
    }
}