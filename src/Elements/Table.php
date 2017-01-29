<?php


namespace src\Elements;

use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use SensioLabs\Behat\PageObjectExtension\PageObject\Factory;
class Table extends ProxyElement
{
    /**
     * @param $rowNum
     * @param $colNum
     * @return null|string
     */
    public function getCellText($rowNum, $colNum)
    {
        return $this->getCell($rowNum, $colNum)->getText();
    }

    /**
     * @param $rowNum
     * @param $colNum
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCell($rowNum, $colNum)
    {
        $xpath = $this->getElement()->getXpath()."/tbody/tr[".$rowNum."]/td[".$colNum."]";
        $cellText = $this->getElement()->getSession()->getPage()->find('xpath', $xpath);

        return $cellText;
    }

    /**
     * @param $accountNum
     * @param $th
     * @return null|string
     */
    public function getCellTextForRowContainsTextAndTh($rowContains, $th)
    {
        $rowNumber = $this->getRowNumberContainingText($rowContains);
        $colNumber = $this->getColumnNumberWithThContains($th);
        $cell = null;

        if ($rowNumber !== 0 && $colNumber !== 0)
            $cell = $this->getCellText($rowNumber, $colNumber);

        return $cell;
    }

    /**
     * @param $rowContains
     * @param $th
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellForRowContainsTextAndTh($rowContains, $th)
    {
        $rowNumber = $this->getRowNumberContainingText($rowContains);
        $colNumber = $this->getColumnNumberWithThContains($th);
        $cell = null;

        if ($rowNumber !== 0 && $colNumber !== 0)
            $cell = $this->getCell($rowNumber, $colNumber);

        return $cell;
    }

    /**
     * @return array
     */
    public function getAllRows()
    {
        $rows = $this->getElement()->getSession()->getPage()->findAll(
            'xpath', $this->getElement()->getXpath() . "/tbody/tr");

        return $rows;
    }

    /**
     * @param $needle
     * @return int
     */
    public function getRowNumberContainingText($needle)
    {
        $rows = $this->getAllRows();

        $count = 0;
        foreach ($rows as $row )
        {
            $count++;
            if (strpos(mb_strtolower($row->getText()), mb_strtolower($needle)) !== false)
                break;
        }

        return $count;
    }

    /**
     * @param $needle
     * @return int
     */
    public function getColumnNumberWithThContains($needle)
    {
        $headers = $this->getElement()->getSession()->getPage()->findAll(
            'xpath',
            $this->getElement()->getXpath() . "/thead/tr/th"
        );
        if ($headers == null){
            $headers = $this->getElement()->getSession()->getPage()->findAll(
                'xpath',
                $this->getElement()->getXpath() . "/tbody/tr/td"
            );
        }

        $count = 0;
        foreach ($headers as $th)
        {
            $count++;
            if (strpos($th->getText(), $needle) !== false)
                break;
        }

        return $count;
    }

    /**
     * @param $rowNum
     * @param $colNum
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellSpanElement($rowNum, $colNum)
    {
        $xpath = $this->getElement()->getXpath()."/tbody/tr[".$rowNum."]/td[".$colNum."]/span";
        $cellElement = $this->getElement()->getSession()->getPage()->find('xpath', $xpath);

        return $cellElement;
    }

    /**
     * @param $rowContains
     * @param $th
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellSpanElementForRowContainsTextAndTh($rowContains, $th)
    {
        $rowNumber = $this->getRowNumberContainingText($rowContains);
        $colNumber = $this->getColumnNumberWithThContains($th);
        $cell = null;

        if ($rowNumber !== 0 && $colNumber !== 0)
            $cell = $this->getCellSpanElement($rowNumber, $colNumber);

        return $cell;
    }

    /**
     * @param $rowNum
     * @param $colNum
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellTextLink($rowNum, $colNum)
    {
        $xpath = $this->getElement()->getXpath()."/tbody/tr[".$rowNum."]/td[".$colNum."]/h2/a";
        $cellElement = $this->getElement()->getSession()->getPage()->find('xpath', $xpath);

        return $cellElement;
    }

    /**
     * @param $rowContains
     * @param $th
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellTextLinkForRowContainsTextAndTh($rowContains, $th)
    {
        $rowNumber = $this->getRowNumberContainingText($rowContains);
        $colNumber = $this->getColumnNumberWithThContains($th);
        $cell = null;

        if ($rowNumber !== 0 && $colNumber !== 0)
            $cell = $this->getCellTextLink($rowNumber, $colNumber);

        return $cell;
    }

    /**
     * @param $rowNum
     * @param $colNum
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellInput($rowNum, $colNum)
    {
        $xpath = $this->getElement()->getXpath()."/tbody/tr[".$rowNum."]/td[".$colNum."]/input";
        $cellElement = $this->getElement()->getSession()->getPage()->find('xpath', $xpath);

        return $cellElement;
    }

    /**
     * @param $rowContains
     * @param $th
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellInputForRowContainsTextAndTh($rowContains, $th)
    {
        $rowNumber = $this->getRowNumberContainingText($rowContains);
        $colNumber = $this->getColumnNumberWithThContains($th);
        $cell = null;

        if ($rowNumber !== 0 && $colNumber !== 0)
            $cell = $this->getCellInput($rowNumber, $colNumber);

        return $cell;
    }

    /**
     * @param $rowNum
     * @param $colNum
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellLink($rowNum, $colNum)
    {
        $xpath = $this->getElement()->getXpath()."/tbody/tr[".$rowNum."]/td[".$colNum."]/a";
        $cellElement = $this->getElement()->getSession()->getPage()->find('xpath', $xpath);

        return $cellElement;
    }

    /**
     * @param $rowContains
     * @param $th
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellLinkForRowContainsTextAndTh($rowContains, $th)
    {
        $rowNumber = $this->getRowNumberContainingText($rowContains);
        $colNumber = $this->getColumnNumberWithThContains($th);
        $cell = null;

        if ($rowNumber !== 0 && $colNumber !== 0)
            $cell = $this->getCellLink($rowNumber, $colNumber);

        return $cell;
    }

    /**
     * @param $rowNum
     * @param $colNum
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellH3TextLink($rowNum, $colNum)
    {
        $xpath = $this->getElement()->getXpath()."/tbody/tr[".$rowNum."]/td[".$colNum."]/h3/a";
        $cellElement = $this->getElement()->getSession()->getPage()->find('xpath', $xpath);

        return $cellElement;
    }

    /**
     * @param $rowContains
     * @param $th
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellH3TextLinkForRowContainsTextAndTh($rowContains, $th)
    {
        $rowNumber = $this->getRowNumberContainingText($rowContains);
        $colNumber = $this->getColumnNumberWithThContains($th);
        $cell = null;

        if ($rowNumber !== 0 && $colNumber !== 0)
            $cell = $this->getCellH3TextLink($rowNumber, $colNumber);

        return $cell;
    }

    /**
     * @param $rowNum
     * @param $colNum
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellSpanText($rowNum, $colNum)
    {
        $xpath = $this->getElement()->getXpath()."/tbody/tr[".$rowNum."]/td[".$colNum."]/div/div/span/span";
        $cellElement = $this->getElement()->getSession()->getPage()->find('xpath', $xpath);

        return $cellElement;
    }

    /**
     * @param $rowContains
     * @param $th
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellSpanTextForRowContainsTextAndTh($rowContains, $th)
    {
        $rowNumber = $this->getRowNumberContainingText($rowContains);
        $colNumber = $this->getColumnNumberWithThContains($th);
        $cell = null;

        if ($rowNumber !== 0 && $colNumber !== 0)
            $cell = $this->getCellSpanText($rowNumber, $colNumber);

        return $cell;
    }

    /**
     * @param $rowNum
     * @param $colNum
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellDivInput($rowNum, $colNum)
    {
        $xpath = $this->getElement()->getXpath()."/tbody/tr[".$rowNum."]/td[".$colNum."]/div/div/input";
        $cellElement = $this->getElement()->getSession()->getPage()->find('xpath', $xpath);

        return $cellElement;
    }

    /**
     * @param $rowContains
     * @param $th
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellDivInputForRowContainsTextAndTh($rowContains, $th)
    {
        $rowNumber = $this->getRowNumberContainingText($rowContains);
        $colNumber = $this->getColumnNumberWithThContains($th);
        $cell = null;

        if ($rowNumber !== 0 && $colNumber !== 0)
            $cell = $this->getCellDivInput($rowNumber, $colNumber);

        return $cell;
    }

    /**
     * @param $rowNum
     * @param $colNum
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellButton($rowNum, $colNum)
    {
        $xpath = $this->getElement()->getXpath()."/tbody/tr[".$rowNum."]/td[".$colNum."]/div/div/button/span";
        $cellElement = $this->getElement()->getSession()->getPage()->find('xpath', $xpath);

        return $cellElement;
    }

    /**
     * @param $rowContains
     * @param $th
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellButtonForRowContainsTextAndTh($rowContains, $th)
    {
        $rowNumber = $this->getRowNumberContainingText($rowContains);
        $colNumber = $this->getColumnNumberWithThContains($th);
        $cell = null;

        if ($rowNumber !== 0 && $colNumber !== 0)
            $cell = $this->getCellButton($rowNumber, $colNumber);

        return $cell;
    }

    /**
     * @param $rowNum
     * @param $colNum
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellTextArea($rowNum, $colNum)
    {
        $xpath = $this->getElement()->getXpath()."/tbody/tr[".$rowNum."]/td[".$colNum."]/textarea";
        $cellElement = $this->getElement()->getSession()->getPage()->find('xpath', $xpath);

        return $cellElement;
    }

    /**
     * @param $rowContains
     * @param $th
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellTextAreaForRowContainsTextAndTh($rowContains, $th)
    {
        $rowNumber = $this->getRowNumberContainingText($rowContains);
        $colNumber = $this->getColumnNumberWithThContains($th);
        $cell = null;

        if ($rowNumber !== 0 && $colNumber !== 0)
            $cell = $this->getCellTextArea($rowNumber, $colNumber);

        return $cell;
    }

    /**
     * @param $rowNum
     * @param $colNum
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellDivLink($rowNum, $colNum)
    {
        $xpath = $this->getElement()->getXpath()."/tbody/tr[".$rowNum."]/td[".$colNum."]/div/p/a";
        $cellElement = $this->getElement()->getSession()->getPage()->find('xpath', $xpath);

        return $cellElement;
    }

    /**
     * @param $rowContains
     * @param $th
     * @return \Behat\Mink\Element\NodeElement|null
     */
    public function getCellDivLinkForRowContainsTextAndTh($rowContains, $th)
    {
        $rowNumber = $this->getRowNumberContainingText($rowContains);
        $colNumber = $this->getColumnNumberWithThContains($th);
        $cell = null;

        if ($rowNumber !== 0 && $colNumber !== 0)
            $cell = $this->getCellDivLink($rowNumber, $colNumber);

        return $cell;
    }



}