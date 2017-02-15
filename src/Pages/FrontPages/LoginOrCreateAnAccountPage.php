<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use src\Elements\Checkbox;

class LoginOrCreateAnAccountPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/customer/account/login/';

    protected $elements = [
        'fldEmailAddress' => ['xpath' => '//div[@class=\'input-box\']/input[@id=\'email\']'],
        'fldPassword' => ['xpath' => '//div[@class=\'input-box\']/input[@id=\'pass\']'],
        'btnLogin' => ['xpath' => '//button[@id=\'send2\']/span/span'],
        'chkRememberMe' => ['xpath' => '//ul/li[@id=\'remember-me-box\']/div[@class=\'input-box\']/input'],
        'btnCreateAnAccount' => ['xpath' => '//button[@class=\'button\']/span/span[contains(text(), "Create an Account")]'],
    ];

    /**
     * @return Element
     */
    public function getFldPassword()
    {
        return $this->getElement('fldPassword');
    }

    /**
     * @return Element
     */
    public function getFldEmailAddress()
    {
        return $this->getElement('fldEmailAddress');
    }

    /**
     * @return Element
     */
    public function getBtnLogin()
    {
        return $this->getElement('btnLogin');
    }

    /**
     * @return Checkbox
     */
    public function getChkRememberMe()
    {
        return $this->getCheckbox('chkRememberMe');
    }

    public function fillLoginForms($emailAddress, $password, $rememberMe)
    {
        $this->getFldEmailAddress()->setValue($emailAddress);
        $this->getFldPassword()->setValue($password);
        $this->getChkRememberMe()->setValue($rememberMe);
    }

    /**
     * @return Element
     */
    public function getBtnCreateAnAccount()
    {
        return $this->getElement('btnCreateAnAccount');
    }
}