<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class AddProductToWishlistPopup extends BasePage
{
    protected $elements = [
        'lnkItemName' => ['xpath' => '//div[@id=\'product_info_box\']/div[@class=\'p_name\']/a'],
        'btnContinueShopping' => ['xpath' => '//div/a[@id=\'continue_shopping\']'],
        'btnGoToWishList' => ['xpath' => '//div[@class=\'wrapper_box pop_wishlist1\'][3]/div[4]/a[@id=\'shopping_cart\']'],
        'txtSuccessfullyMessage' => ['xpath' => '']
    ];

    /**
     * @return Element
     */
    public function getLnkItemName()
    {
        return $this->getElement('lnkItemName');
    }

    /**
     * @return Element
     */
    public function getBtnContinueShopping()
    {
        return $this->getElement('btnContinueShopping');
    }

    /**
     * @return Element
     */
    public function getBtnGoToWishList()
    {
        return $this->getElement('btnGoToWishList');
    }

    public function waitUntilPopupIsPresent()
    {
        $this->waitUntilElementIsPresent('btnContinueShopping');
    }
}