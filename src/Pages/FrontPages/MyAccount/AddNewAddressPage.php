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
        return $this->getElement('fldTelephone');
    }

    /**
     * @return Element
     */
    public function getFldStreetAddress()
    {
        return $this->getElement('fldStreetAddress');
    }

    /**
     * @return Element
     */
    public function getBtnAddNewAddress()
    {
        return $this->getElement('btnAddNewAddress');
    }

    /**
     * @return Element
     */
    public function getFldCity()
    {
        return $this->getElement('fldCity');
    }

    /**
     * @return Element
     */
    public function getFldPostalCode()
    {
        return $this->getElement('fldPostalCode');
    }

    /**
     * @return Element
     */
    public function getFldState()
    {
        return $this->getElement('fldState');
    }

    /**
     * @return Element
     */
    public function getFldCountry()
    {
        return $this->getElement('fldCountry');
    }

    /**
     * @return Checkbox
     */
    public function getChkBillingAddress()
    {
        return $this->getCheckbox('chkBillingAddress');
    }

    /**
     * @return Checkbox
     */
    public function getChkShippingAddress()
    {
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
        return $this->getElement('btnSaveAddress');
    }

    /**
     * @return Element
     */
    public function getFldFirstName()
    {
        return $this->getElement('fldFirstName');
    }

    /**
     * @return Element
     */
    public function getFldLastName()
    {
        return $this->getElement('fldLastName');
    }
}