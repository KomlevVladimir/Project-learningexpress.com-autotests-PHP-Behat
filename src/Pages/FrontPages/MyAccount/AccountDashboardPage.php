<?php


namespace src\Pages\FrontPages\MyAccount;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class AccountDashboardPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/customer/account/index/';

    protected $elements = [
        'txtHeader' => ['xpath' => '//div[@class=\'page-title\']/h1'],
        'lnkEditContactInformation' => ['xpath' => '//div[@class=\'col2-set\']/div[@class=\'col-1\']/div/div/a'],
        'txtContactInformation' => ['xpath' => '//div[@class=\'col2-set\']/div[@class=\'col-1\']/div/div/p'],
        'lnkChangePassword' => ['xpath' => '//div[@class=\'box-content\']/p/a'],
        'txtHelloMessage' => ['xpath' => '//p[@class=\'hello\']/strong'],
        'txtInformationHasBeenSavedMessage' => ['xpath' => '//div[@class=\'alert alert-success\']/ul/li/ul/li/span'],
        'txtNewsletterSubscription' => ['xpath' => '//div[@class=\'col-2\']/div[@class=\'box\']/div[@class=\'box-content\']'],
        'lnkEditNewsLetterSubscription' => ['xpath' => '//div[@class=\'col2-set\']/div[@class=\'col-2\']/div/div/a'],
        'txtSubscriptionMessage' => ['xpath' => '//div[@class=\'alert alert-success\']/ul/li/ul/li/span'],
        ];

    /**
     * @return Element
     */
    public function getTxtHeader()
    {
        $this->waitElement('txtHeader');

        return $this->getElement('txtHeader');
    }

    /**
     * @return Element
     */
    public function getLnkEditContactInformation()
    {
        $this->waitElement('lnkEditContactInformation');

        return $this->getElement('lnkEditContactInformation');
    }

    /**
     * @return Element
     */
    public function getTxtContactInformation()
    {
        $this->waitElement('txtContactInformation');

        return $this->getElement('txtContactInformation');
    }

    /**
     * @return Element
     */
    public function getLnkChangePassword()
    {
        $this->waitElement('lnkChangePassword');

        return $this->getElement('lnkChangePassword');
    }

    public function txtHelloMessageIsPresent()
    {
        $this->waitElement('lnkChangePassword');

        return $this->isElementPresent('txtHelloMessage');
    }

    /**
     * @return Element
     */
    public function gettxtInformationHasBeenSavedMessage()
    {
        $this->waitElement('txtInformationHasBeenSavedMessage');

        return $this->getElement('txtInformationHasBeenSavedMessage');
    }

    /**
     * @return Element
     */
    public function getTxtNewsletterSubscription()
    {
        $this->waitElement('txtNewsletterSubscription');

        return $this->getElement('txtNewsletterSubscription');
    }

    /**
     * @return Element
     */
    public function getLnkEditNewsLetterSubscription()
    {
        $this->waitElement('lnkEditNewsLetterSubscription');

        return $this->getElement('lnkEditNewsLetterSubscription');
    }

    /**
     * @return Element
     */
    public function getTxtSubscriptionMessage()
    {
        $this->waitElement('txtSubscriptionMessage');

        return $this->getElement('txtSubscriptionMessage');
    }
}