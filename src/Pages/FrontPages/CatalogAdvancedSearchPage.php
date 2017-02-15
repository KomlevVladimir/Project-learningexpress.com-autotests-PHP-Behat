<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class CatalogAdvancedSearchPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/catalogsearch/advanced/';

    protected $elements = [
        'txtRecommendedAges' => ['xpath' => '//div[@class=\'advanced-search-summary\']/ul[2]/li'],
        'txtInterest' => ['xpath' => '//div[@class=\'advanced-search-summary\']/ul[2]/li'],
        'txtPrice' => ['xpath' => '//div[@class=\'advanced-search-summary\']/ul[1]/li[1]'],
        'txtItemsNumber' => ['xpath' => '//div[@class=\'pager\']/div[@class=\'pager_bottom\']/p[@class=\'total_product\']'],
        'fldName' => ['xpath' => '//ul/li/div[@class=\'input-box\']/input[@id=\'name\']'],
        'fldDescription' => ['xpath' => '//ul/li/div[@class=\'input-box\']/input[@id=\'description\']'],
        'fldShortDescription' => ['xpath' => '//ul/li/div[@class=\'input-box\']/input[@id=\'short_description\']'],
        'fldSku' => ['xpath' => '//ul/li/div[@class=\'input-box\']/input[@id=\'sku\']'],
        'fldPriceFrom' => ['xpath' => '//ul/li/div[@class=\'input-range\']/input[@id=\'price\']'],
        'fldPriceTo' => ['xpath' => '//ul/li/div[@class=\'input-range\']/input[@id=\'price_to\']'],
        'fldManufacturer' => ['xpath' => '//ul/li/div[@class=\'input-box\']/input[@id=\'manufreeform\']'],
        'btnSearch' => ['xpath' => '//form[@id=\'form-validate\']/div[@class=\'buttons-set\']/button[@class=\'button\']/span/span'],
        'itemFreight' => ['xpath' => '//ul/li/div/select[@id=\'package_id\']/option[contains(text(), "FREIGHT")]'],
        'itemGiftCard' => ['xpath' => '//ul/li/div/select[@id=\'package_id\']/option[contains(text(), "GIFTCARD")]'],
        'itemStandard' => ['xpath' => '//ul/li/div/select[@id=\'package_id\']/option[contains(text(), "STANDARD")]'],
        'txtResultMessage' => ['xpath' => '//div[@class=\'col-main span9\']/p[@class=\'advanced-search-amount\']'],
        'txtNoResultMessage' => ['xpath' => '//div[@class=\'col-main span9\']/p[@class=\'error-msg\']'],
        ];

    /**
     * @return Element
     */
    public function getTxtRecommendedAges()
    {
        return $this->getElement('txtRecommendedAges');
    }

    /**
     * @return Element
     */
    public function getTxtInterest()
    {
        return $this->getElement('txtInterest');
    }

    /**
     * @return Element
     */
    public function getTxtPrice()
    {
        return $this->getElement('txtPrice');
    }

    /**
     * @return Element
     */
    public function getTxtItemsNumber()
    {
        return $this->getElement('txtItemsNumber');
    }

    /**
     * @return Element
     */
    public function getFldName()
    {
        return $this->getElement('fldName');
    }

    /**
     * @return Element
     */
    public function getFldDescription()
    {
        return $this->getElement('fldDescription');
    }

    /**
     * @return Element
     */
    public function getFldShortDescription()
    {
        return $this->getElement('fldShortDescription');
    }

    /**
     * @return Element
     */
    public function getFldSku()
    {
        return $this->getElement('fldSku');
    }

    /**
     * @return Element
     */
    public function getFldPriceFrom()
    {
        return $this->getElement('fldPriceFrom');
    }

    /**
     * @return Element
     */
    public function getFldPriceTo()
    {
        return $this->getElement('fldPriceTo');
    }

    /**
     * @return Element
     */
    public function getFldManufacturer()
    {
        return $this->getElement('fldManufacturer');
    }

    /**
     * @return Element
     */
    public function getBtnSearch()
    {
        return $this->getElement('btnSearch');
    }

    /**
     * @return Element
     */
    public function getItemFreight()
    {
        return $this->getElement('itemFreight');
    }

    /**
     * @return Element
     */
    public function getItemGiftCard()
    {
        return $this->getElement('itemGiftCard');
    }

    /**
     * @return Element
     */
    public function getItemStandard()
    {
        return $this->getElement('itemStandard');
    }


    public function getRecommendedAgesItem($recommendedAges)
    {
        return $this->find(
            'xpath',
            '//ul/li/div/select[@id=\'agerange\']/option[contains(text(), "' . $recommendedAges . '")]'
        );
    }

    public function getSkillBuildersItem($skillBuilders)
    {
        return $this->find(
            'xpath',
            '//ul/li/div//select[@id=\'skillbuilders\']/option[contains(text(), "' . $skillBuilders . '")]'
        );
    }

    public function getInterestItem($interest)
    {
        return $this->find(
            'xpath',
            '//ul/li/div//select[@id=\'interest\']/option[contains(text(), "' . $interest . '")]'
        );
    }

    public function selectAdditionalShippingItem($additionalShipping)
    {
        switch ($additionalShipping) {
            case "Not selected":

                break;

            case "Freight":
                $this->getItemFreight()->click();

                break;

            case "Gift card":
                $this->getItemGiftCard()->click();

                break;

            case "Standard":
                $this->getItemStandard()->click();

                break;
        }

    }

    public function setSearchParameters(
        $name, $description, $shortDescription,
        $sku, $priceFrom, $priceTo, $manufacturer,
        $recommendedAges, $skillBuilders,
        $additionalShipping, $interest
    )
    {
        $this->getFldName()->setValue($name);
        $this->getFldDescription()->setValue($description);
        $this->getFldShortDescription()->setValue($shortDescription);
        $this->getFldSku()->setValue($sku);
        $this->getFldPriceFrom()->setValue($priceFrom);
        $this->getFldPriceTo()->setValue($priceTo);
        $this->getFldManufacturer()->setValue($manufacturer);
        $this->getRecommendedAgesItem($recommendedAges)->click();
        $this->getSkillBuildersItem($skillBuilders)->click();
        $this->selectAdditionalShippingItem($additionalShipping);
        $this->getInterestItem($interest)->click();
    }

    /**
     * @return Element
     */
    public function getTxtResultMessage()
    {
        return $this->getElement('txtResultMessage');
    }

    /**
     * @return Element
     */
    public function getTxtNoResultMessage()
    {
        return $this->getElement('txtNoResultMessage');
    }

    public function noResultMessageIsPresent()
    {
        return $this->isElementPresent('txtNoResultMessage');
    }

}