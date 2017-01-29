<?php


namespace src\Pages\FrontPages\MyAccount;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class AddressBookPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/customer/address/';

    protected $elements = [
        'btnAddNewAddress' => ['xpath' => '//button[@class=\'button\']/span/span[contains(text(), "Add New Address")]'],
        'txtBillingAddress' => ['xpath' => '//div[@class=\'col-1 addresses-primary\']/ol/li[@class=\'item\'][1]/address'],
        'txtAddressHasBeenSaved' => ['xpath' => '//div[@class=\'alert alert-success\']/ul/li/ul/li/span'],
        'txtShippingAddress' => ['xpath' => '//div[@class=\'col-1 addresses-primary\']/ol/li[@class=\'item\'][2]/address'],
        'lnkChangeBillingAddress' => ['xpath' => '//div[@class=\'col-1 addresses-primary\']/ol/li[@class=\'item\'][1]/p/a'],
        'lnkChangeShippingAddress' => ['xpath' => '//div[@class=\'col-1 addresses-primary\']/ol/li[@class=\'item\'][2]/p/a'],
        'txtNoAddresses' => ['xpath' => '//div/ol/li[@class=\'item empty\']/p'],
        ];

    /**
     * @return Element
     */
    public function getBtnAddNewAddress()
    {
        $this->waitElement('btnAddNewAddress');

        return $this->getElement('btnAddNewAddress');
    }

    /**
     * @return Element
     */
    public function getTxtBillingAddress()
    {
        $this->waitElement('txtBillingAddress');

        return $this->getElement('txtBillingAddress');
    }

    /**
     * @return Element
     */
    public function getTxtAddressHasBeenSaved()
    {
        $this->waitElement('txtAddressHasBeenSaved');

        return $this->getElement('txtAddressHasBeenSaved');
    }

    /**
     * @return Element
     */
    public function getTxtShippingAddress()
    {
        $this->waitElement('txtShippingAddress');

        return $this->getElement('txtShippingAddress');
    }

    public function getAdditionalAddressCount()
    {
        $elements = $this->findAll('xpath', '//div[@class=\'col-2 addresses-additional\']/ol/li/address');

        return count($elements);
    }

    public function getAdditionalAddressByNumber($i)
    {
        return $this->find('xpath', '//div[@class=\'col-2 addresses-additional\']/ol/li[' . $i . ']/address');
    }

    /**
     * @return Element
     */
    public function getLnkChangeBillingAddress()
    {
        $this->waitElement('lnkChangeBillingAddress');

        return $this->getElement('lnkChangeBillingAddress');
    }

    /**
     * @return Element
     */
    public function getLnkChangeShippingAddress()
    {
        $this->waitElement('lnkChangeShippingAddress');

        return $this->getElement('lnkChangeShippingAddress');
    }

    public function getLnkEditAddressByNumber($i)
    {
        return $this->find('xpath', '//div[@class=\'col-2 addresses-additional\']/ol/li[' . $i . ']/p/a[1]');
    }

    public function getLnkDeleteAddressByNumber($i)
    {
        return $this->find('xpath', '//div[@class=\'col-2 addresses-additional\']/ol/li[' . $i . ']/p/a[@class=\'link-remove\']');
    }

    public function txtNoAddressesIsPresent()
    {
        return $this->isElementPresent('txtNoAddresses');
    }



}