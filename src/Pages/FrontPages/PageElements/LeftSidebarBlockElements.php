<?php

namespace src\Pages\FrontPages\PageElements;

use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class LeftSidebarBlockElements extends BasePage
{
    protected $elements = [
        'fldSearch' => ['xpath' => '//div[@class=\'form-search\']/input[@id=\'search\']'],
        'lnkAdvancedSearch' => ['xpath' => '//div[@class=\'main-inner\']/div/div/p/a'],
        'btnSearch' => ['xpath' => '//div[@class=\'form-search\']/button[@class=\'button\']/span'],
        'btnClearAll' => ['xpath' => '//div[@class=\'block-content\']/div[@class=\'actions\']/a'],
        'btnSkillsBuildersCatalog' => ['xpath' => '//p/a[contains(text(), "Skill Builders Catalog")]'],
        'btnVisitOuHeadQuarters' => ['xpath' => '//p/a[@class=\'btn\'][contains(text(), "Visit our Headquarters")]'],
        'cmbArchiveList' => ['xpath' => '//select[@id=\'blog-archive-dropdown\']']
    ];

    /**
     * @return Element
     */
    public function getFldSearch()
    {
        $this->waitElement('fldSearch');

        return $this->getElement('fldSearch');
    }

    /**
     * @return Element
     */
    public function getLnkAdvancedSearch()
    {
        $this->waitElement('lnkAdvancedSearch');

        return $this->getElement('lnkAdvancedSearch');
    }

    /**
     * @return Element
     */
    public function getBtnSearch()
    {
        $this->waitElement('btnSearch');

        return $this->getElement('btnSearch');
    }

    /**
     * @return Element
     */
    public function getBtnClearAll()
    {
        $this->waitElement('btnClearAll');

        return $this->getElement('btnClearAll');
    }

    /**
     * @return Element
     */
    public function getBtnSkillsBuildersCatalog()
    {
        $this->waitElement('btnSkillsBuildersCatalog');

        return $this->getElement('btnSkillsBuildersCatalog');
    }

    /**
     * @return Element
     */
    public function getBtnVisitOuHeadQuarters()
    {
        $this->waitElement('btnVisitOuHeadQuarters');

        return $this->getElement('btnVisitOuHeadQuarters');
    }

    public function getPostByName($linkName)
    {
        return $this->find('xpath', '//div[@class=\'block-content\']/ul/li/a[contains(text(), "' . $linkName . '")]');
    }

    public function getCategoryByName($linkName)
    {
        return $this->find('xpath', '//div[@class=\'block-content\']/ul[@id=\'wp-category-list\']/li/a[contains(text(), "' . $linkName . '")]');
    }

    /**
     * @return Element
     */
    public function getCmbArchiveList()
    {
        $this->waitElement('cmbArchiveList');

        return $this->getElement('cmbArchiveList');
    }
}