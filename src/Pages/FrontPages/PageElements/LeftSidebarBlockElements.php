<?php

namespace src\Pages\FrontPages\PageElements;

use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class LeftSidebarBlockElements extends BasePage
{
    protected $elements = [
        'fldSearch' => ['xpath' => '//div[@class=\'form-search\']/input[@id=\'search\']'],
        'lnkAdvancedSearch' => ['xpath' => '//div[@class=\'main-inner\']/div/div/p/a'],
        'btnSearch' => ['xpath' => '//div[@class=\'form-search\']/button[@class=\'button\']/span'],
        ];

    /**
     * @return Element
     */
    public function getFldSearch()
    {
        $this->waitElement('fldSearch');
        return $this->getElement('fldSearch');
    }

    /**
     * @return Element
     */
    public function getLnkAdvancedSearch()
    {
        $this->waitElement('lnkAdvancedSearch');
        return $this->getElement('lnkAdvancedSearch');
    }

    /**
     * @return Element
     */
    public function getBtnSearch()
    {
        $this->waitElement('btnSearch');
        return $this->getElement('btnSearch');
    }
}