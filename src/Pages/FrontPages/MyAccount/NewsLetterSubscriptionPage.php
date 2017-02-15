<?php


namespace src\Pages\FrontPages\MyAccount;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use src\Elements\Checkbox;

class NewsLetterSubscriptionPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/newsletter/manage/';

    protected $elements = [
        'chkGeneralSubscription' => ['xpath' => '//input[@id=\'subscription\']'],
        'btnSave' => ['xpath' => '//button[@class=\'button\']/span/span[contains(text(), "Save")]'],
        ];

    /**
     * @return Element
     */
    public function getbtnSave()
    {
        return $this->getElement('btnSave');
    }

    /**
     * @return Checkbox
     */
    public function getChkGeneralSubscription()
    {
        return $this->getCheckbox('chkGeneralSubscription');
    }
}