<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'globals/conn.php';
include 'classes/products.php';

$productId = $_POST['productId'];

$productHandler = new products($conn);
$product = $productHandler->getProductFromId($productId);


echo $modal = "<div class='modal fade' id='modalProductInfo' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title' id='myModalLabel'>" . $product->getName() . "</h4>
            </div>
            <div class='modal-body'>
                <div class='thumbnail center-block'>
                    <img src='gfx/productimg/" . $product->getCode() . ".png'>
                </div>
                <p>Pcs/kolli: " . $product->getKolli() . "</p>
                <p>Price/kolli: " . $product->getPrice() . ",-</p>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>";