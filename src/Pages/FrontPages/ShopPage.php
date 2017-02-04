<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class ShopPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/shop-online/';

    protected $elements = [
        'txtFilterParameter' => ['xpath' => '//div[@class=\'currently\']/ol/li/span[@class=\'value\']'],
        'txtItemsNumber' => ['xpath' => '//div[@class=\'pager\']/div[@class=\'pager_bottom\']/p[@class=\'total_product\']'],
    ];

    public function getLink($link)
    {
        return $this->find('xpath', '//div/div/div/dl/dd/ol/li/a[contains(text(), "' . $link . '")]');
    }

    /**
     * @return Element
     */
    public function getTxtFilterParameter()
    {
        $this->waitElement('txtFilterParameter');

        return $this->getElement('txtFilterParameter');
    }

    /**
     * @return Element
     */
    public function getTxtItemsNumber()
    {
        $this->waitElement('txtItemsNumber');

        return $this->getElement('txtItemsNumber');
    }


    public function txtFilterParameterIsPresent()
    {
        return $this->isElementPresent('txtFilterParameter');
    }
}