<?php


namespace src\Pages\FrontPages\MyAccount;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class ChangePasswordPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/customer/account/edit/changepass/1/';

    protected $elements = [
        'fldCurrentPassword' => ['xpath' => '//input[@id=\'dummy\']'],
        'fldConfirmCurrentPassword' => ['xpath' => '//input[@id=\'current_password\']'],
        'fldNewPassword' => ['xpath' => '//input[@id=\'password\']'],
        'fldConfirmNewPassword' => ['xpath' => '//input[@id=\'confirmation\']'],
        'btnSave' => ['xpath' => '//button[@class=\'button\']/span/span[contains(text(), "Save")]'],
        ];

    /**
     * @return Element
     */
    public function getFldCurrentPassword()
    {
        $this->waitElement('fldCurrentPassword');

        return $this->getElement('fldCurrentPassword');
    }

    /**
     * @return Element
     */
    public function getFldConfirmCurrentPassword()
    {
        $this->waitElement('fldConfirmCurrentPassword');

        return $this->getElement('fldConfirmCurrentPassword');
    }

    /**
     * @return Element
     */
    public function getFldNewPassword()
    {
        $this->waitElement('fldNewPassword');

        return $this->getElement('fldNewPassword');
    }

    /**
     * @return Element
     */
    public function getFldConfirmNewPassword()
    {
        $this->waitElement('fldConfirmNewPassword');

        return $this->getElement('fldConfirmNewPassword');
    }

    public function fillChangePasswordForms($currentPassword, $newPassword)
    {
        $this->getFldCurrentPassword()->setValue($currentPassword);
        $this->getFldConfirmCurrentPassword()->setValue($currentPassword);
        $this->getFldNewPassword()->setValue($newPassword);
        $this->getFldConfirmNewPassword()->setValue($newPassword);
    }

    /**
     * @return Element
     */
    public function getBtnSave()
    {
        $this->waitElement('btnSave');

        return $this->getElement('btnSave');
    }

}