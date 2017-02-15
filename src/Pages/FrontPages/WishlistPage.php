<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class WishlistPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/wishlist/';

    protected $elements = [
        'wishlistTable' => ['xpath' => '//table[@id=\'wishlist-table\']'],
        'txtWishlistIsEmpty' => ['xpath' => '//fieldset/p[@class=\'wishlist-empty\']'],
        'btnUpdateWishlist' => ['xpath' => '//button[@class=\'button btn-update\']/span/span'],
        'btnAddAllToCart' => ['xpath' => '//button[@class=\'button btn-add\']/span/span'],

    ];

    /**
     * @return \src\Elements\Table
     */
    public function getWishlistTable()
    {
        return $this->getTable('wishlistTable');
    }

    public function wishlistTableIsPresent()
    {
        return $this->isElementPresent('wishlistTable');
    }

    /**
     * @return Element
     */
    public function getTxtWishlistIsEmpty()
    {
        return $this->getElement('txtWishlistIsEmpty');
    }

    /**
     * @return Element
     */
    public function getBtnUpdateWishlist()
    {
        return $this->getElement('btnUpdateWishlist');
    }

    /**
     * @return Element
     */
    public function getBtnAddAllToCart()
    {
        return $this->getElement('btnAddAllToCart');
    }

    public function waitUntilWishlistIsEmpty()
    {
        $this->waitUntilElementIsPresent('txtWishlistIsEmpty');
    }
}