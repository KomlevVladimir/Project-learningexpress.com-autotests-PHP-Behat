<?php


namespace src\Pages\FrontPages\PageElements;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class HeaderBlockElements extends BasePage
{
    protected $elements = [
        'btnMyAccount' => ['xpath' => '//ul[@class=\'links visible-desktop\']/li[@class=\'first\']/a'],
        'btnLogout' => ['xpath' => '//ul[@class=\'links visible-desktop\']/a'],
        'lnkMeuItemNews' => ['xpath' => '//div[@class=\'column col2\']/div/a/strong'],
        'lnkMenuItemFranchising' => ['xpath' => '//div[@id=\'block2_pt_item_menu_custom_menu\']/ul/li[2]/a'],
        ];

    /**
     * @return Element
     */
    public function getBtnMyAccount()
    {
        return $this->getElement('btnMyAccount');
    }

    /**
     * @return Element
     */
    public function getBtnLogout()
    {
        return $this->getElement('btnLogout');
    }

    public function getLnkHeaderMenuByName($linkName)
    {
        return $this->find('xpath', '//div/div/a/span[contains(text(), "' . $linkName .'")]');
    }

    public function getLnkSubmenuByName($linkName)
    {
        return $this->find('xpath', '//div/div[1]/ul/li/a[contains(text(), "' . $linkName .'")]');
    }

    public function getLnkSubmenuStrongTagByName($linkName)
    {
        return $this->find('xpath', '//div/div[1]/ul/li/a/strong[contains(text(), "' . $linkName .'")]');
    }

    public function getLnkFranchiseSubmenuByName($linkName)
    {
        return $this->find('xpath', '//div[@id=\'block16\']/div/div/a[contains(text(), "' . $linkName . '")]');
    }

    /**
     * @return Element
     */
    public function getLnkMeuItemNews()
    {
        return $this->getElement('lnkMeuItemNews');
    }

    /**
     * @return Element
     */
    public function getLnkMenuItemFranchising()
    {
        return $this->getElement('lnkMenuItemFranchising');
    }

}