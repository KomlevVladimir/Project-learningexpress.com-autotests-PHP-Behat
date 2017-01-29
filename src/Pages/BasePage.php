<?php

namespace src\Pages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use Symfony\Component\Config\Definition\Exception\Exception;
use src\Elements\Checkbox;
use src\Elements\Table;

abstract class BasePage extends Page
{
    /**
     * @var array
     */
    protected $elements = [];

    public function isElementPresent($name)
    {
        $element = $this->find('xpath', $this->elements[$name]['xpath']);

        return $element !== null && $element->isVisible();
    }

    public function waitElement($name)
    {
        foreach (range(1, 10) as $i) {
            try {
                if ($this->isElementPresent($name)) {
                    break;
                }
            } catch (\Exception $e) { }
            sleep(1);
        }
        if (!$this->isElementPresent($name)) {
            throw new Exception('time out');
        }
    }

    /**
     * @param $name
     * @return Checkbox
     */
    public function getCheckbox($name)
    {
        return new Checkbox($this->getElement($name));
    }

    /**
     * @param $name
     * @return Table
     */
    public function getTable($name)
    {
        return new Table($this->getElement($name));
    }

    public function confirmPopup()
    {
        $this->getSession()->getDriver()->getWebDriverSession()->accept_alert();
    }

    public function cancelPopup()
    {
        $this->getSession()->getDriver()->getWebDriverSession()->dismiss_alert();
    }



}