<?php


namespace src\Pages\FrontPages\PageElements;


use src\Pages\BasePage;

class FooterBlockElements extends BasePage
{
    public function getLnkFooterMenuByName($linkName)
    {
        return $this->find('xpath', '//div[2]/ul/li/a[contains(text(), "' . $linkName .'")]');
    }
}