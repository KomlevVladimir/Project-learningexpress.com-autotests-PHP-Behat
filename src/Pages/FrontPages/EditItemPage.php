<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class EditItemPage extends BasePage
{
    protected $elements = [
        'txtItemName' => ['xpath' => '//div[@class=\'product-shop span8\']/div[@class=\'product-name\']/h1'],
        'fldQuantity' => ['xpath' => '//div[@class=\'product-qty\']/input[@id=\'qty\']'],
        'btnUpdateWishList' => ['xpath' => '//div[@class=\'add-to-box\']/ul/li/a'],
        ];

    /**
     * @return Element
     */
    public function getTxtItemName()
    {
        $this->waitElement('txtItemName');

        return $this->getElement('txtItemName');
    }

    /**
     * @return Element
     */
    public function getFldQuantity()
    {
        $this->waitElement('fldQuantity');

        return $this->getElement('fldQuantity');
    }

    /**
     * @return Element
     */
    public function getBtnUpdateWishList()
    {
        $this->waitElement('btnUpdateWishList');

        return $this->getElement('btnUpdateWishList');
    }
}