<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use src\Elements\Checkbox;

class ElectronicGiftCardPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/electronic-gift-card/';

    protected $elements = [
        'fldEnterAmount' => ['xpath' => '//input[@id=\'amount_reference\']'],
        'chkSendGiftCardToFriend' => ['xpath' => '//input[@id=\'send_friend\']'],
        'fldQuantity' => ['xpath' => '//input[@id=\'qty\']'],
        'btnAddToCard' => ['xpath' => '//button[@class=\'button btn-cart\']/span/span'],
        'txtHeaderGiftCard' => ['xpath' => '//div[@class=\'product-name\']/h1'],
        'fldRecipientName' => ['xpath' => '//input[@id=\'recipient_name\']'],
        'fldRecipientEmail' => ['xpath' => '//input[@id=\'recipient_email\']'],
        'fldCustomMessage' => ['xpath' => '//textarea[@id=\'message\']'],
        ];

    /**
     * @return Element
     */
    public function getFldEnterAmount()
    {
        return $this->getElement('fldEnterAmount');
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
    public function getBtnAddToCard()
    {
        return $this->getElement('btnAddToCard');
    }

    /**
     * @return Element
     */
    public function getChkSendGiftCardToFriend()
    {
        return $this->getElement('chkSendGiftCardToFriend');
    }

    /**
     * @return Element
     */
    public function getTxtHeaderGiftCard()
    {
        return $this->getElement('txtHeaderGiftCard');
    }

    /**
     * @return Element
     */
    public function getFldRecipientName()
    {
        return $this->getElement('fldRecipientName');
    }

    /**
     * @return Element
     */
    public function getFldRecipientEmail()
    {
        return $this->getElement('fldRecipientEmail');
    }

    /**
     * @return Element
     */
    public function getFldCustomMessage()
    {
        return $this->getElement('fldCustomMessage');
    }
}