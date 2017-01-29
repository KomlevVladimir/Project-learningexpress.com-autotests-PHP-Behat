<?php

namespace src\Pages\FrontPages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use src\Pages\BasePage;

class MainPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = 'https://learningexpress.com/';

    protected $elements = [
        'fldChooseAge' => ['xpath' => '//form/p[3]/div[@id=\'age_chosen\']/ul[@class=\'chosen-choices\']'],
        'fldChooseInterests' => ['xpath' => '//div[@id=\'interests_chosen\']/ul[@class=\'chosen-choices\']/li[@class=\'search-field\']/input[@id=\'toyfinder5\']'],
        'btnToyFinderSearch' => ['xpath' => '//button[@class=\'button button-toy-finder\']/span/span'],
        'fldBudgetFrom' => ['xpath' => '//form/div[@id=\'search-toy\']/input[@id=\'from\']'],
        'fldBudgetTo' => ['xpath' => '//div[@class=\'toy-finder-inner\']/form/div[@id=\'search-toy\']/input[@id=\'to\']'],
        'untilTwelveMonths' => ['xpath' => '//ul/li[contains(text(), "0-12 Months")]'],
        'fromOneToTwoYears' => ['xpath' => '//ul/li[contains(text(), "1-2 Years")]'],
        'elevenPlusYears' => ['xpath' => '//ul/li[contains(text(), "11+ Years")]'],
        'artAndCrafts' => ['xpath' => '//ul/li[contains(text(), "Arts & Crafts")]'],
        'constructionToys' => ['xpath' => '//ul/li[contains(text(), "Construction Toys")]'],
        'lnkFirstItem' => ['xpath' => '//div[@class=\'products-grid row-fluid\'][1]/div[1]/div/a'],
        'lnkSecondItem' => ['xpath' => '//div[@class=\'products-grid row-fluid\'][1]/div[2]/div/a'],
        'lnkThirdItem' => ['xpath' => '//div[@class=\'products-grid row-fluid\'][1]/div[3]/div/a'],
        'lnkFourthItem' => ['xpath' => '//div[@class=\'products-grid row-fluid\'][2]/div[1]/div/a'],
        ];

    /**
     * @return Element
     */
    public function getFldChooseAge()
    {
        $this->waitElement('fldChooseAge');
        return $this->getElement('fldChooseAge');
    }

    /**
     * @return Element
     */
    public function getFldChooseInterests()
    {
        $this->waitElement('fldChooseInterests');
        return $this->getElement('fldChooseInterests');
    }

    /**
     * @return Element
     */
    public function getBtnToyFinderSearch()
    {
        $this->waitElement('btnToyFinderSearch');
        return $this->getElement('btnToyFinderSearch');
    }

    /**
     * @return Element
     */
    public function getFldBudgetFrom()
    {
        $this->waitElement('fldBudgetFrom');
        return $this->getElement('fldBudgetFrom');
    }

    /**
     * @return Element
     */
    public function getFldBudgetTo()
    {
        $this->waitElement('fldBudgetTo');
        return $this->getElement('fldBudgetTo');
    }

    /**
     * @return Element
     */
    public function getUntilTwelveMonths()
    {
        $this->waitElement('untilTwelveMonths');
        return $this->getElement('untilTwelveMonths');
    }

    /**
     * @return Element
     */
    public function getFromOneToTwoYears()
    {
        $this->waitElement('fromOneToTwoYears');
        return $this->getElement('fromOneToTwoYears');
    }

    /**
     * @return Element
     */
    public function getElevenPlusYears()
    {
        $this->waitElement('elevenPlusYears');
        return $this->getElement('elevenPlusYears');
    }

    /**
     * @return Element
     */
    public function getArtAndCrafts()
    {
        $this->waitElement('artAndCrafts');
        return $this->getElement('artAndCrafts');
    }

    /**
     * @return Element
     */
    public function getConstructionToys()
    {
        $this->waitElement('constructionToys');
        return $this->getElement('constructionToys');
    }

    public function selectAge($age)
    {
        $this->getFldChooseAge()->click();

        switch ($age) {
            case "0-12 Months":
                $this->getUntilTwelveMonths()->click();

                break;

            case "1-2 Years":
                $this->getFromOneToTwoYears()->click();

                break;

            case "11+ Years":
                $this->getElevenPlusYears()->click();

                break;
        }
    }

    public function selectInterest($interest)
    {
        $this->getFldChooseInterests()->click();

        switch ($interest) {
            case "Arts & Crafts":
                $this->getArtAndCrafts()->click();

                break;

            case "Construction Toys":
                $this->getConstructionToys()->click();

                break;
        }
    }

    /**
     * @return Element
     */
    public function getLnkFirstItem()
    {
        return $this->getElement('lnkFirstItem');
    }

    /**
     * @return Element
     */
    public function getLnkSecondItem()
    {
        return $this->getElement('lnkSecondItem');
    }

    /**
     * @return Element
     */
    public function getLnkThirdItem()
    {
        return $this->getElement('lnkThirdItem');
    }

    /**
     * @return Element
     */
    public function getLnkFourthItem()
    {
        return $this->getElement('lnkFourthItem');
    }

    /**
     * @return Element
     */
    public function getTxtEighthItemPrice()
    {
        return $this->getElement('txtEighthItemPrice');
    }

}