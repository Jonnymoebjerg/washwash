<?php

include_once 'dbtable.php';

class customers extends dbTable {

    protected $fields = array("id", "customerNumber", "currency", "paymentTermsNumber", "customerGroup", "address", "balance", "dueAmount", "city", "country", "email", "name", "zip", "telephoneAndFaxNumber", "vatZone");
    protected $tablename = "api_customers";

    public function getId() {
        return $this->properties["id"];
    }

    public function setCustomerNumber($customerNumber) {
        $this->properties["customerNumber"] = $customerNumber;
    }

    public function setCurrency($currency) {
        $this->properties["currency"] = $currency;
    }

    public function setPaymentTermsNumber($paymentTermsNumber) {
        $this->properties["paymentTermsNumber"] = $paymentTermsNumber;
    }

    public function setCustomerGroup($customerGroup) {
        $this->properties["customerGroup"] = $customerGroup;
    }

    public function setAddress($address) {
        $this->properties["address"] = $address;
    }

    public function setBalance($balance) {
        $this->properties["balance"] = $balance;
    }

    public function setDueAmount($dueAmount) {
        $this->properties["dueAmount"] = $dueAmount;
    }

    public function setCity($city) {
        $this->properties["city"] = $city;
    }

    public function setCountry($country) {
        $this->properties["country"] = $country;
    }

    public function setEmail($email) {
        $this->properties["email"] = $email;
    }

    public function setName($name) {
        $this->properties["name"] = $name;
    }

    public function setZip($zip) {
        $this->properties["zip"] = $zip;
    }

    public function setTelephoneAndFaxNumber($telephoneAndFaxNumber) {
        $this->properties["telephoneAndFaxNumber"] = $telephoneAndFaxNumber;
    }

    public function setVatZone($vatZone) {
        $this->properties["vatZone"] = $vatZone;
    }
    
    public function setCustomer($customerNumber,$currency,$paymentTermsNumber,$customerGroup,$address,$balance,$dueAmount,$city,$country,$email,$name,$zip,$telephoneAndFaxNumber,$vatZone) {
        $this->setCustomerNumber($customerNumber);
        $this->setCurrency($currency);
        $this->setPaymentTermsNumber($paymentTermsNumber);
        $this->setCustomerGroup($customerGroup);
        $this->setAddress($address);
        $this->setBalance($balance);
        $this->setDueAmount($dueAmount);
        $this->setCity($city);
        $this->setCountry($country);
        $this->setEmail($email);
        $this->setName($name);
        $this->setZip($zip);
        $this->setTelephoneAndFaxNumber($telephoneAndFaxNumber);
        $this->setVatZone($vatZone);
        $this->save();
        return "Succes";
    }
}
