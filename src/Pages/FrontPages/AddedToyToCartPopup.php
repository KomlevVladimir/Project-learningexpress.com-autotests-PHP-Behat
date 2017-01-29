<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class AddedToyToCartPopup extends BasePage
{
    protected $elements = [
        'lnkItemName' => ['xpath' => '//div[@id=\'product_info_box\']/div[@class=\'p_name\']/a'],
        'btnContinueShopping' => ['xpath' => '//div/a[@id=\'continue_shopping\']'],
        'btnGoToShoppingCart' => ['xpath' => '//div/a[@id=\'shopping_cart\']'],
        ];

    /**
     * @return Element
     */
    public function getLnkItemName()
    {
        $this->waitElement('lnkItemName');

        return $this->getElement('lnkItemName');
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
    public function getBtnGoToShoppingCart()
    {
        $this->waitElement('btnGoToShoppingCart');

        return $this->getElement('btnGoToShoppingCart');
    }
}