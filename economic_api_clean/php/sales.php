<?php

include_once 'dbtable.php';

class sales extends dbTable {

    protected $fields = array("id", "invoiceNumber", "date", "customerNumber", "grossAmount");
    protected $tablename = "api_sales";

    public function getId() {
        return $this->properties["id"];
    }

    public function setInvoiceNumber($invoiceNumber) {
        $this->properties["invoiceNumber"] = $invoiceNumber;
    }

    public function setDate($date) {
        $this->properties["date"] = $date;
    }

    public function setCustomerNumber($customerNumber) {
        $this->properties["customerNumber"] = $customerNumber;
    }

    public function setGrossAmount($grossAmount) {
        $this->properties["grossAmount"] = $grossAmount;
    }
    
    public function setSale($invoiceNumber,$date,$customerNumber,$grossAmount) {
        $this->setInvoiceNumber($invoiceNumber);
        $this->setDate($date);
        $this->setCustomerNumber($customerNumber);
        $this->setGrossAmount($grossAmount);
        $this->save();
        return "Succes";
    }
}
