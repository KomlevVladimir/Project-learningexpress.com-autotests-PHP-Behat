<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class PostPage extends BasePage
{
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