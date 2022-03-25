<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conn.php';
include 'products.php';
include 'inventory.php';

$productsHandler = new products($conn);
$inventoryHandler = new inventory($conn);

$productNumber = $_POST['productNumber'];
$name = $_POST['name'];
$description = $_POST['description'];
$costPrice = $_POST['costPrice'];
$salesPrice = $_POST['salesPrice'];
$productGroup = $_POST['productGroup'];
$unitNumber = "5";

$available = $_POST['available'];
$inStock = $_POST['inStock'];

$productsHandler->setProduct($productNumber,$name,$description,$costPrice,$salesPrice,$productGroup,$unitNumber);

$product = $productsHandler->getProduct($productNumber);
$productId = $product->getId();

$inventoryHandler->setInventory($productId, $available, $inStock);