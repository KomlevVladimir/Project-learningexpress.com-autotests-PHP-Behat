<?php


namespace src\Pages\FrontPages\Shop;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class SkillBuildersCatalogPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/shop-online/skill-builders/';

    protected $elements = [
        'txtHeader' => ['xpath' => '//div[@class=\'page-title post-title\']/h1'],
        ];

    /**
     * @return Element
     */
    public function getTxtHeader()
    {
        return $this->getElement('txtHeader');
    }
}