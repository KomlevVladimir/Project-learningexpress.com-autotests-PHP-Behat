<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class CatalogSearchPage extends BasePage
{
    protected $elements = [
        'txtItemsNumber' => ['xpath' => '//div[@class=\'pager\']/div[@class=\'pager_bottom\']/p[@class=\'total_product\']'],
        'txtNoResultsMessage' => ['xpath' => '//div[@class=\'col-main span9\']/p[@class=\'note-msg\']'],
    ];

    /**
     * @return Element
     */
    public function getTxtItemsNumber()
    {
        $this->waitElement('txtItemsNumber');
        return $this->getElement('txtItemsNumber');
    }

    /**
     * @return Element
     */
    public function getTxtNoResultsMessage()
    {
        $this->waitElement('txtNoResultsMessage');
        return $this->getElement('txtNoResultsMessage');
    }
}