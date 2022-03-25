<?php

include_once 'dbtable.php';

class products extends dbTable {

    protected $fields = array("id", "productNumber", "description", "name", "costPrice", "salesPrice", "productGroup", "unitNumber");
    protected $tablename = "api_products";

    public function getId() {
        return $this->properties["id"];
    }

    public function getProductNumber() {
        return $this->properties["productNumber"];
    }

    public function getDescription() {
        return $this->properties["description"];
    }

    public function getName() {
        return $this->properties["name"];
    }

    public function getCostPrice() {
        return $this->properties["costPrice"];
    }

    public function getSalesPrice() {
        return $this->properties["salesPrice"];
    }

    public function getProductGroup() {
        return $this->properties["productGroup"];
    }

    public function getUnitNumber() {
        return $this->properties["unitNumber"];
    }

    public function setProductNumber($productNumber) {
        $this->properties["productNumber"] = $productNumber;
    }

    public function setName($name) {
        $this->properties["name"] = $name;
    }
    
    public function setDescription($description) {
        $this->properties["description"] = $description;
    }
    
    public function setCostPrice($costPrice) {
        $this->properties["costPrice"] = $costPrice;
    }
    
    public function setSalesPrice($salesPrice) {
        $this->properties["salesPrice"] = $salesPrice;
    }
    
    public function setProductGroup($productGroup) {
        $this->properties["productGroup"] = $productGroup;
    }
    
    public function setUnitNumber($unitNumber) {
        $this->properties["unitNumber"] = $unitNumber;
    }
        
    public function getProduct($productNumber){
        $sql = "SELECT id FROM $this->tablename WHERE productNumber = '$productNumber'";
        $result = $this->conn->query($sql);
        if(!empty($result)){
            $row = $result->fetch_object();
            $product = new products($this->conn, $row->id);
            return $product;
        } else {
            return "Error!";
        }
    }
    
    public function setProduct($productNumber, $name, $description, $costPrice, $salesPrice, $productGroup, $unitNumber) {
        $this->setProductNumber($productNumber);
        $this->setName($name);
        $this->setDescription($description);
        $this->setCostPrice($costPrice);
        $this->setSalesPrice($salesPrice);
        $this->setProductGroup($productGroup);
        $this->setUnitNumber($unitNumber);
        $this->save();
        return "Succes";
    }
}
