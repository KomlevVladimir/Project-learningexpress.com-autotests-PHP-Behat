<?php


namespace src\Pages\FrontPages\PageElements;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class MyAccountLeftSideBar extends BasePage
{
    protected $elements = [
        'lnkAddressBook' => ['xpath' => '//div[@class=\'block-content\']/ul/li/a[contains(text(), "Address Book")]'],
        ];

    /**
     * @return Element
     */
    public function getLnkAddressBook()
    {
        $this->waitElement('lnkAddressBook');

        return $this->getElement('lnkAddressBook');
    }

    public function getLinkMenuByName($linkName)
    {
        return $this->find('xpath', '//div[@class=\'block-content\']/ul/li/a[contains(text(), "' . $linkName .'")]');
    }
}