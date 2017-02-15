<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class MonthlyArchivesPage extends BasePage
{
    protected $elements = [
        'txtHeader' => ['xpath' => '//div[@class=\'page-title\']/h1'],
    ];

    /**
     * @return Element
     */
    public function getTxtHeader()
    {
        return $this->getElement('txtHeader');
    }
}