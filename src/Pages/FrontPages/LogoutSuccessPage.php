<?php


namespace src\Pages\FrontPages;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class LogoutSuccessPage extends BasePage
{

    /**
     * @var string
     */
    protected $path = '/customer/account/logoutSuccess/';

    protected $elements = [
        'txtHeader' => ['xpath' => '//div[@class=\'col-main\']/div[@class=\'page-title\']/h1'],
    ];

    /**
     * @return Element
     */
    public function getTxtHeader()
    {
        $this->waitElement('txtHeader');

        return $this->getElement('txtHeader');
    }
}