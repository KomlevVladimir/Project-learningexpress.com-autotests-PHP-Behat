<?php


namespace src\Pages\FrontPages;

use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class ItemPage extends BasePage
{
    protected $elements = [
        'txtItemName' => ['xpath' => '//div[@class=\'product-shop span8\']/div[@class=\'product-name\']/h1'],
        'txtItemPrice' => ['xpath' => '//span[@id=\'product-price-3828\']/span[@class=\'price\']'],
        'itemImage' => ['xpath' => '//div[@id=\'wrap\']/div[@class=\'mousetrap\'][3]'],
        'zoomedItemImage' => ['xpath' => '//div[@id=\'wrap\']/div[@id=\'cloud-zoom-big\']'],
        'lnkAdditionalInformationTab' => ['xpath' => '//ul/li[@id=\'product_tabs_additional\']/a'],
        'txtAdditionalInformationContent' => ['xpath' => '//div/div[@id=\'product_tabs_additional_contents\']'],
        'fldQuantity' => ['xpath' => '//div[@class=\'product-qty\']/input[@id=\'qty\']'],
        'btnIncreaseQuantity' => ['xpath' => '//div[@class=\'product-qty\']/input[@class=\'qty-increase\']'],
        'btnAddToCart' => ['xpath' => '//div[@class=\'add-to-cart\']/button[@class=\'button btn-cart\']/span/span'],
        'btnDecreaseQuantity' => ['xpath' => '//div[@class=\'product-qty\']/input[@class=\'qty-decrease\']'],
        'btnWishList' => ['xpath' => '//div[@class=\'add-to-box\']/ul/li/a'],
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
    public function getTxtItemPrice()
    {
        $this->waitElement('txtItemPrice');

        return $this->getElement('txtItemPrice');
    }

    /**
     * @return Element
     */
    public function getItemImage()
    {
        $this->waitElement('itemImage');

        return $this->getElement('itemImage');
    }

    public function zoomedImageIsPresent()
    {
        return $this->isElementPresent('zoomedItemImage');
    }

    /**
     * @return Element
     */
    public function getLnkAdditionalInformationTab()
    {
        $this->waitElement('lnkAdditionalInformationTab');

        return $this->getElement('lnkAdditionalInformationTab');
    }

    /**
     * @return Element
     */
    public function getTxtAdditionalInformationContent()
    {
        $this->waitElement('txtAdditionalInformationContent');

        return $this->getElement('txtAdditionalInformationContent');
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
    public function getBtnIncreaseQuantity()
    {
        $this->waitElement('btnIncreaseQuantity');

        return $this->getElement('btnIncreaseQuantity');
    }

    /**
     * @return Element
     */
    public function getBtnAddToCart()
    {
        $this->waitElement('btnAddToCart');

        return $this->getElement('btnAddToCart');
    }

    /**
     * @return Element
     */
    public function getBtnDecreaseQuantity()
    {
        $this->waitElement('btnDecreaseQuantity');

        return $this->getElement('btnDecreaseQuantity');
    }

    /**
     * @return Element
     */
    public function getBtnWishList()
    {
        $this->waitElement('btnWishList');

        return $this->getElement('btnWishList');
    }

}