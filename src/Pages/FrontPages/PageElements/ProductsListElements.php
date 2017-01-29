<?php


namespace src\Pages\FrontPages\PageElements;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class ProductsListElements extends BasePage
{
    protected $elements = [
        'btnGridSorting' => ['xpath' => '//div[@class=\'pager_top\']/p[@class=\'view-mode\']/span[2]/a[@class=\'grid\']'],
        'btnListSorting' => ['xpath' => '//div[@class=\'pager_top\']/p[@class=\'view-mode\']/span[1]/a[@class=\'list\']'],
        'imagesItemsSortedByGrid' => ['xpath' => '//div[@class=\'item-inner product_detail_item\']/a[@class=\'product-image\']'],
        'imagesItemsSortedByList' => ['xpath' => '//div[@class=\'category-products\']/ol[@id=\'products-list\']/li/a[@class=\'product-image\']'],
        'lstShowPerPage' => ['xpath' => '//select[@id=\'show-product\']'],
        'cartPopup' => ['xpath' => '//div[@class=\'wrapper_box\']'],
        ];

    public function getItemPrice($i)
    {
        return $this->find('xpath', '//ol/li[' . $i . ']/div/div/div/div/div[@class=\'product_list_price store-list\']');
    }

    public function getItemName($i)
    {
        return $this->find('xpath', '//ol/li[' . $i . ']/div/div/h2[@class=\'product-name\']');
    }

    public function getItemDescription($i)
    {
        return $this->find('xpath', '//ol/li[' . $i . ']/div/div/div[@class=\'desc std\']');
    }

    public function getLnkItemName($i)
    {
        return $this->find('xpath', '//ol/li[' . $i . ']/div/div/h2[@class=\'product-name\']/a');
    }

    public function getBtnAddToCartByItemNumber($i)
    {
        return $this->find('xpath', '//ol/li[' . $i . ']/div/div/div/button/span/span');
    }

    public function getBtnAddToWishList($i)
    {
        return $this->find('xpath', '//ol/li[' . $i .']/div/div/div/ul/li[2]/a');
    }

    /**
     * @return Element
     */
    public function getBtnGridSorting()
    {
        $this->waitElement('btnGridSorting');

        return $this->getElement('btnGridSorting');
    }

    /**
     * @return Element
     */
    public function getBtnListSorting()
    {
        $this->waitElement('btnListSorting');

        return $this->getElement('btnListSorting');
    }


    public function imagesItemsSortedByGridIsPresent()
    {
        $this->waitElement('imagesItemsSortedByGrid');

        return $this->isElementPresent('imagesItemsSortedByGrid');
    }

    public function imagesItemsSortedByListIsPresent()
    {
        $this->waitElement('imagesItemsSortedByList');

        return $this->isElementPresent('imagesItemsSortedByList');
    }

    /**
     * @return Element
     */
    public function getLstShowPerPage()
    {
        $this->waitElement('lstShowPerPage');

        return $this->getElement('lstShowPerPage');
    }

    public function allItemsCount()
    {
        $elements = $this->findAll('xpath', '//ol/li/div/div/h2[@class=\'product-name\']');

        return count($elements);
    }

    /**
     * @return Element
     */
    public function getCartPopup()
    {
        $this->waitElement('cartPopup');

        return $this->getElement('cartPopup');
    }

    public function cartPopupIsPresent()
    {
        return $this->isElementPresent('cartPopup');
    }

    public function getItemByName($itemName)
    {
        return $this->find('xpath', '//div[@class=\'product-shop\']/div/h2/a[contains(text(), "' . $itemName .'")]');
    }

}