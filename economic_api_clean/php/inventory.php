<?php

include_once 'dbtable.php';

class inventory extends dbTable {

    protected $fields = array("id", "productId", "available", "inStock");
    protected $tablename = "api_inventory";

    public function getId() {
        return $this->properties["id"];
    }

    public function getProductId() {
        return $this->properties["productId"];
    }

    public function getAvailable() {
        return $this->properties["available"];
    }

    public function getInStock() {
        return $this->properties["inStock"];
    }

    public function setProductId($productId) {
        $this->properties["productId"] = $productId;
    }

    public function setAvailable($available) {
        $this->properties["available"] = $available;
    }
    
    public function setInStock($inStock) {
        $this->properties["inStock"] = $inStock;
    }
    
    public function setInventory($productId, $available, $inStock) {
        $this->setProductId($productId);
        $this->setAvailable($available);
        $this->setInStock($inStock);
        $this->save();
        return "Succes";
    }
}
