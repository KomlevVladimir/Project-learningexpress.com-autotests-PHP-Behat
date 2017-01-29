<?php


namespace src\Pages\FrontPages\MyAccount;


use src\Pages\BasePage;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use src\Elements\Checkbox;

class AddNewAddressPage extends BasePage
{
    /**
     * @var string
     */
    protected $path = '/customer/address/new//';

    protected $elements = [
        'fldTelephone' => ['xpath' => '//input[@id=\'telephone\']'],
        'fldStreetAddress' => ['xpath' => '//input[@id=\'street_1\']'],
        'fldCity' => ['xpath' => '//input[@id=\'city\']'],
        'fldPostalCode' => ['xpath' => '//input[@id=\'zip\']'],
        'fldState' => ['xpath' => '//select[@id=\'region_id\']'],
        'fldCountry' => ['xpath' => '//select[@id=\'country\']'],
        'chkBillingAddress' => ['xpath' => '//input[@id=\'primary_billing\']'],
        'chkShippingAddress' => ['xpath' => '//input[@id=\'primary_shipping\']'],
        'btnSaveAddress' => ['xpath' => '//button[@class=\'button\']/span/span[contains(text(), "Save Address")]'],
        'fldFirstName' => ['xpath' => '//input[@id=\'firstname\']'],
        'fldLastName' => ['xpath' => '//input[@id=\'lastname\']'],
    ];

    /**
     * @return Element
     */
    public function getFldTelephone()
    {
        $this->waitElement('fldTelephone');

        return $this->getElement('fldTelephone');
    }

    /**
     * @return Element
     */
    public function getFldStreetAddress()
    {
        $this->waitElement('fldStreetAddress');

        return $this->getElement('fldStreetAddress');
    }

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
    public function getFldCity()
    {
        $this->waitElement('fldCity');

        return $this->getElement('fldCity');
    }

    /**
     * @return Element
     */
    public function getFldPostalCode()
    {
        $this->waitElement('fldPostalCode');

        return $this->getElement('fldPostalCode');
    }

    /**
     * @return Element
     */
    public function getFldState()
    {
        $this->waitElement('fldState');

        return $this->getElement('fldState');
    }

    /**
     * @return Element
     */
    public function getFldCountry()
    {
        $this->waitElement('fldCountry');

        return $this->getElement('fldCountry');
    }

    /**
     * @return Checkbox
     */
    public function getChkBillingAddress()
    {
        $this->waitElement('chkBillingAddress');

        return $this->getCheckbox('chkBillingAddress');
    }

    /**
     * @return Checkbox
     */
    public function getChkShippingAddress()
    {
        $this->waitElement('chkShippingAddress');

        return $this->getCheckbox('chkShippingAddress');
    }


    public function fillForms($telephone, $streetAddress, $city, $state, $postalCode, $country, $useAsMyDefaultBillingAddress, $useAsMyDefaultShippingAddress)
    {
        $this->getFldTelephone()->setValue($telephone);
        $this->getFldStreetAddress()->setValue($streetAddress);
        $this->getFldCity()->setValue($city);
        $this->getFldPostalCode()->setValue($postalCode);
        $this->getFldState()->selectOption($state);
        $this->getFldCountry()->selectOption($country);
        $this->getFldState()->selectOption($state);
        $this->getChkBillingAddress()->setValue($useAsMyDefaultBillingAddress);
        $this->getChkShippingAddress()->setValue($useAsMyDefaultShippingAddress);
    }

    /**
     * @return Element
     */
    public function getBtnSaveAddress()
    {
        $this->waitElement('btnSaveAddress');

        return $this->getElement('btnSaveAddress');
    }

    /**
     * @return Element
     */
    public function getFldFirstName()
    {
        $this->waitElement('fldFirstName');

        return $this->getElement('fldFirstName');
    }

    /**
     * @return Element
     */
    public function getFldLastName()
    {
        $this->waitElement('fldLastName');

        return $this->getElement('fldLastName');
    }
}