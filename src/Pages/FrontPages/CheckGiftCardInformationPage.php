<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class CheckGiftCardInformationPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/giftvoucher/index/check/';

    protected $elements = [
        'fldEnterYourGiftCardCode' => ['xpath' => '//input[@id=\'giftvoucher_code\']'],
        'fldCaptcha' => ['xpath' => '//input[@id=\'captcha_code\']'],
        'btnCheckGiftCard' => ['xpath' => '//button[@class=\'button\']/span/span'],
        'errorMessage' => ['xpath' => '//div[@class=\'alert alert-error\']/ul/li/ul/li'],
    ];

    /**
     * @return Element
     */
    public function getFldEnterYourGiftCardCode()
    {
        $this->waitElement('fldEnterYourGiftCardCode');

        return $this->getElement('fldEnterYourGiftCardCode');
    }

    /**
     * @return Element
     */
    public function getFldCaptcha()
    {
        $this->waitElement('fldCaptcha');

        return $this->getElement('fldCaptcha');
    }

    /**
     * @return Element
     */
    public function getBtnCheckGiftCard()
    {
        $this->waitElement('btnCheckGiftCard');

        return $this->getElement('btnCheckGiftCard');
    }

    public function fillForms($giftCardCode, $captchaCode)
    {
        $this->getFldEnterYourGiftCardCode()->setValue($giftCardCode);
        $this->getFldCaptcha()->setValue($captchaCode);
    }

    /**
     * @return Element
     */
    public function getErrorMessage()
    {
        $this->waitElement('errorMessage');

        return $this->getElement('errorMessage');
    }
}