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

    /**
     * @return Element
     */
    public function getTxtFlashMessage()
    {
        $this->waitElement('txtFlashMessage');

        return $this->getElement('txtFlashMessage');
    }

    /**
     * @return Element
     */
    public function getLnkReviewsTab()
    {
        $this->waitElement('lnkReviewsTab');

        return $this->getElement('lnkReviewsTab');
    }

    /**
     * @return Element
     */
    public function getFldNickName()
    {
        $this->waitElement('fldNickName');

        return $this->getElement('fldNickName');
    }

    /**
     * @return Element
     */
    public function getFldSummaryOfYourReview()
    {
        $this->waitElement('fldSummaryOfYourReview');

        return $this->getElement('fldSummaryOfYourReview');
    }

    /**
     * @return Element
     */
    public function getFldReview()
    {
        $this->waitElement('fldReview');

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
        $this->waitElement('btnSubmitReview');

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