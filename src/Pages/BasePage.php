<?php

namespace src\Pages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use Symfony\Component\Config\Definition\Exception\Exception;
use src\Elements\Checkbox;
use src\Elements\Table;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;


abstract class BasePage extends Page
{

    protected $elementNameForWaitingPage = null;

    /**
     * @var array
     */
    protected $elements = [];

    /**
     * @param $lambda
     * @param int $wait
     * @return bool
     * @throws \Exception
     */
    public function spin($lambda, $wait = 10)
    {
        for ($i = 0; $i < $wait; $i++){
            try {
                if ($lambda($this)){
                    return true;
                }
            }catch (\Exception $e){

            }
            sleep(1);
        }

        $backtrace = debug_backtrace();

        throw new \Exception(
            "Timeout thrown by " . $backtrace[1]['class'] . "::" . $backtrace[1]['function'] . "()\n" .
            $backtrace[1]['file'] . ", line " . $backtrace[1]['line']
        );
    }

    /**
     * @param $name
     * @throws \Exception
     */
    public function waitUntilElementIsPresent($name)
    {
        $this->spin(
            function ($page)use ($name){
                $element = $page->find('xpath', $this->elements[$name]['xpath']);
                return ($element !== null);
            }
        );
    }

    /**
     * @param $name
     * @throws \Exception
     */
    public function waitUntilElementIsVisible($name)
    {
        $this->spin(
            function ($page)use ($name){
                $element = $page->find('xpath', $this->elements[$name]['xpath']);
                return ($element !== null && $element->isVisible());
            }
        );
    }

    /**
     * @param string $name
     * @return Element
     *
     */
    public function getElement($name)
    {
        $element = $this->createElement($name);

        $this->spin(
            function ()use ($element){
                return $this->has('xpath', $element->getXpath())/*&& $element->isVisible()*/
                    ;
            }
        );

        return $element;
    }

    public function isElementPresent($name)
    {
        $element = $this->find('xpath', $this->elements[$name]['xpath']);

        return $element !== null && $element->isVisible();
    }

    public function waitUntilLoaded()
    {
        $name = $this->elementNameForWaitingPage;
        if ($name !== null)
            $this->waitUntilElementIsVisible($name);
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

    public function assertPopupMessage($message)
    {
        return $message == $this->getSession()->getDriver()->getWebDriverSession()->getAlert_text();
    }



}