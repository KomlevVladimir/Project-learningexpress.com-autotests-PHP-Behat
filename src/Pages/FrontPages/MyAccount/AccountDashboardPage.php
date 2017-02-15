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
        'txtFlashMessage' => ['xpath' => '//div[@class=\'alert alert-success\']'],
        ];

    /**
     * @return Element
     */
    public function getTxtHeader()
    {
        return $this->getElement('txtHeader');
    }

    /**
     * @return Element
     */
    public function getLnkEditContactInformation()
    {
        return $this->getElement('lnkEditContactInformation');
    }

    /**
     * @return Element
     */
    public function getTxtContactInformation()
    {
        return $this->getElement('txtContactInformation');
    }

    /**
     * @return Element
     */
    public function getLnkChangePassword()
    {
        return $this->getElement('lnkChangePassword');
    }

    public function txtHelloMessageIsPresent()
    {
        return $this->isElementPresent('txtHelloMessage');
    }

    /**
     * @return Element
     */
    public function gettxtInformationHasBeenSavedMessage()
    {
        return $this->getElement('txtInformationHasBeenSavedMessage');
    }

    /**
     * @return Element
     */
    public function getTxtNewsletterSubscription()
    {
        return $this->getElement('txtNewsletterSubscription');
    }

    /**
     * @return Element
     */
    public function getLnkEditNewsLetterSubscription()
    {
        return $this->getElement('lnkEditNewsLetterSubscription');
    }

    /**
     * @return Element
     */
    public function getTxtSubscriptionMessage()
    {
        return $this->getElement('txtSubscriptionMessage');
    }

    /**
     * @return Element
     */
    public function getTxtFlashMessage()
    {
        return $this->getElement('txtFlashMessage');
    }
}