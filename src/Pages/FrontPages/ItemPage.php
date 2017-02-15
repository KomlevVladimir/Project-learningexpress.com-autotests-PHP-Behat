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
        'txtFlashMessage' => ['xpath' => '//div[@class=\'alert alert-success\']/ul/li/ul/li/span'],
        'lnkReviewsTab' => ['xpath' => '//ul/li[@id=\'product_tabs_product_additional_data\']/a'],
        'fldNickName' => ['xpath' => '//input[@id=\'nickname_field\']'],
        'fldSummaryOfYourReview' => ['xpath' => '//input[@id=\'summary_field\']'],
        'fldReview' => ['xpath' => '//textarea[@id=\'review_field\']'],
        'btnSubmitReview' => ['xpath' => '//button[@class=\'button\']/span/span[contains(text(), "Submit Review")]'],
        ];

    /**
     * @return Element
     */
    public function getTxtItemName()
    {
        return $this->getElement('txtItemName');
    }

    /**
     * @return Element
     */
    public function getTxtItemPrice()
    {
        return $this->getElement('txtItemPrice');
    }

    /**
     * @return Element
     */
    public function getItemImage()
    {
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
        return $this->getElement('lnkAdditionalInformationTab');
    }

    /**
     * @return Element
     */
    public function getTxtAdditionalInformationContent()
    {
        return $this->getElement('txtAdditionalInformationContent');
    }

    /**
     * @return Element
     */
    public function getFldQuantity()
    {
        return $this->getElement('fldQuantity');
    }

    /**
     * @return Element
     */
    public function getBtnIncreaseQuantity()
    {
        return $this->getElement('btnIncreaseQuantity');
    }

    /**
     * @return Element
     */
    public function getBtnAddToCart()
    {
        return $this->getElement('btnAddToCart');
    }

    /**
     * @return Element
     */
    public function getBtnDecreaseQuantity()
    {
        return $this->getElement('btnDecreaseQuantity');
    }

    /**
     * @return Element
     */
    public function getBtnWishList()
    {
        return $this->getElement('btnWishList');
    }

    /**
     * @return Element
     */
    public function getTxtFlashMessage()
    {
        return $this->getElement('txtFlashMessage');
    }

    /**
     * @return Element
     */
    public function getLnkReviewsTab()
    {
        return $this->getElement('lnkReviewsTab');
    }

    /**
     * @return Element
     */
    public function getFldNickName()
    {
        return $this->getElement('fldNickName');
    }

    /**
     * @return Element
     */
    public function getFldSummaryOfYourReview()
    {
        return $this->getElement('fldSummaryOfYourReview');
    }

    /**
     * @return Element
     */
    public function getFldReview()
    {
        return $this->getElement('fldReview');
    }

    public function getQualityByStars($stars)
    {
        return $this->find('xpath', '//tr[@class=\'first odd\']/td[' . $stars . ']/input');
    }

    public function getPriceByStars($stars)
    {
        return $this->find('xpath', '//tr[@class=\'even\']/td[' . $stars .']/input');
    }

    public function getValueByStars($stars)
    {
        return $this->find('xpath', '//tr[@class=\'last odd\']/td[' . $stars . ']/input');
    }


    /**
     * @return Element
     */
    public function getBtnSubmitReview()
    {
        return $this->getElement('btnSubmitReview');
    }

    public function giveReview($nickName, $summaryOfYourReview, $review, $quality, $price, $value)
    {
        $this->getFldNickName()->setValue($nickName);
        $this->getFldSummaryOfYourReview()->setValue($summaryOfYourReview);
        $this->getFldReview()->setValue($review);
        $this->getQualityByStars($quality)->click();
        $this->getPriceByStars($price)->click();
        $this->getValueByStars($value)->click();
        $this->getBtnSubmitReview()->click();
    }

}