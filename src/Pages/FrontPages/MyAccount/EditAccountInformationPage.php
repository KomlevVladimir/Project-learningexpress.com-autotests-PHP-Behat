<?php


namespace src\Pages\FrontPages\MyAccount;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class EditAccountInformationPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/customer/account/edit/';

    protected $elements = [
        'fldFirstName' => ['xpath' => '//input[@id=\'firstname\']'],
        'fldLastName' => ['xpath' => '//input[@id=\'lastname\']'],
        'fldEmailAddress' => ['xpath' => '//input[@id=\'email\']'],
        'btnSave' => ['xpath' => '//button[@class=\'button\']/span/span[contains(text(), "Save")]'],
        ];

    /**
     * @return Element
     */
    public function getFldFirstName()
    {
        return $this->getElement('fldFirstName');
    }

    /**
     * @return Element
     */
    public function getFldLastName()
    {
        return $this->getElement('fldLastName');
    }

    /**
     * @return Element
     */
    public function getFldEmailAddress()
    {
        return $this->getElement('fldEmailAddress');
    }

    public function fillForms($firstName, $lastName, $emailAddress)
    {
        $this->getFldFirstName()->setValue('');
        $this->getFldLastName()->setValue($lastName);
        $this->getFldEmailAddress()->setValue($emailAddress);
        $this->getFldFirstName()->setValue($firstName);
    }

    /**
     * @return Element
     */
    public function getBtnSave()
    {
        return $this->getElement('btnSave');
    }
}