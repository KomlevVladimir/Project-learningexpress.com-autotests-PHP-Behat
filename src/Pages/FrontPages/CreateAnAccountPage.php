<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use src\Elements\Checkbox;

class CreateAnAccountPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/customer/account/create/';

    protected $elements = [
        'fldFirstName' => ['xpath' => '//input[@id=\'firstname\']'],
        'fldLastName' => ['xpath' => '//input[@id=\'lastname\']'],
        'fldEmailAddress' => ['xpath' => '//input[@id=\'email_address\']'],
        'fldPassword' => ['xpath' => '//input[@id=\'password\']'],
        'fldConfirmPassword' => ['xpath' => '//input[@id=\'confirmation\']'],
        'chkRememberMe' => ['xpath' => '//ul/li[@id=\'remember-me-box\']/div[@class=\'input-box\']/input'],
        'chkSignUpForNewsletter' => ['xpath' => '//input[@id=\'is_subscribed\']'],
        'btnSubmit' => ['xpath' => '//button[@class=\'button\']/span/span[contains(text(), "")]'],

    ];

    /**
     * @return Element
     */
    public function getFldPassword()
    {
        $this->waitElement('fldPassword');

        return $this->getElement('fldPassword');
    }

    /**
     * @return Element
     */
    public function getFldEmailAddress()
    {
        $this->waitElement('fldEmailAddress');

        return $this->getElement('fldEmailAddress');
    }

    /**
     * @return Element
     */
    public function getFldFirstName()
    {
        $this->waitElement('fldFirstName');

        return $this->getElement('fldFirstName');
    }

    /**
     * @return Element
     */
    public function getFldLastName()
    {
        $this->waitElement('fldLastName');

        return $this->getElement('fldLastName');
    }

    /**
     * @return Element
     */
    public function getFldConfirmPassword()
    {
        $this->waitElement('fldConfirmPassword');

        return $this->getElement('fldConfirmPassword');
    }


    /**
     * @return Checkbox
     */
    public function getChkRememberMe()
    {
        $this->waitElement('chkRememberMe');

        return $this->getCheckbox('chkRememberMe');
    }

    /**
     * @return Checkbox
     */
    public function getChkSignUpForNewsletter()
    {
        $this->waitElement('chkSignUpForNewsletter');

        return $this->getCheckbox('chkSignUpForNewsletter');
    }


    public function fillForms ($firstName, $lastName, $emailAddress, $signUpForNewsletter, $password, $confirmPassword, $rememberMe)
    {
        $this->getFldFirstName()->setValue($firstName);
        $this->getFldLastName()->setValue($lastName);
        $this->getFldEmailAddress()->setValue($emailAddress);
        $this->getChkSignUpForNewsletter()->setValue($signUpForNewsletter);
        $this->getFldPassword()->setValue($password);
        $this->getFldConfirmPassword()->setValue($confirmPassword);
        $this->getChkRememberMe()->setValue($rememberMe);
    }

    /**
     * @return Element
     */
    public function getBtnSubmit()
    {
        $this->waitElement('btnSubmit');

        return $this->getElement('btnSubmit');
    }

}