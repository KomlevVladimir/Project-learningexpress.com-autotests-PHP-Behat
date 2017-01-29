<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class ShoppingCartPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/checkout/cart';

    protected $elements = [
        'cartTable' => ['xpath' => '//table[@id=\'shopping-cart-table\']'],
        'btnClearCart' => ['xpath' => '//button[@id=\'empty_cart_button\']/span/span'],
        'btnUpdateCart' => ['xpath' => '//button[@class=\'button btn-update\']/span/span'],
        'txtCartIsEmpty' => ['xpath' => '//div[@class=\'col-main\']/div[@class=\'page-title\']/h1'],
        'btnContinueShopping' => ['xpath' => '//button[@class=\'button btn-continue\']/span/span'],
        'txtTotalAmountDue' => ['xpath' => '//strong/span[@class=\'price\']'],
        'txtMessageItemHasBeenAdded' => ['xpath' => '//div[@class=\'alert alert-success\']/ul/li/ul/li/span'],
        ];

    /**
     * @return \src\Elements\Table
     */
    public function getCartTable()
    {
        $this->waitElement('cartTable');

        return $this->getTable('cartTable');
    }

    /**
     * @return Element
     */
    public function getBtnClearCart()
    {
        $this->waitElement('btnClearCart');

        return $this->getElement('btnClearCart');
    }

    /**
     * @return Element
     */
    public function getBtnUpdateCart()
    {
        $this->waitElement('btnUpdateCart');

        return $this->getElement('btnUpdateCart');
    }

    /**
     * @return Element
     */
    public function getTxtCartIsEmpty()
    {
        $this->waitElement('txtCartIsEmpty');

        return $this->getElement('txtCartIsEmpty');
    }

    public function cartTableIsPresent()
    {
        return $this->isElementPresent('cartTable');
    }

    /**
     * @return Element
     */
    public function getBtnContinueShopping()
    {
        $this->waitElement('btnContinueShopping');

        return $this->getElement('btnContinueShopping');
    }

    /**
     * @return Element
     */
    public function getTxtTotalAmountDue()
    {
        $this->waitElement('txtTotalAmountDue');

        return $this->getElement('txtTotalAmountDue');
    }

    /**
     * @return Element
     */
    public function getTxtMessageItemHasBeenAdded()
    {
        $this->waitElement('txtMessageItemHasBeenAdded');

        return $this->getElement('txtMessageItemHasBeenAdded');
    }

}