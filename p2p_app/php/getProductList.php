<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include '../php/globals/conn.php';
include '../php/classes/products.php';
include '../php/classes/productCategories.php';
include '../php/classes/favorite.php';
 
$productHandler = new products($conn);
$productCategoryHandler = new productCategories($conn);
$favoriteHandler = new favorite($conn);

$categoryId = $_POST['categoryId'];

$currentCart = $_POST['currentCart'];
$cartItems = preg_split( '/(,|:)/', $currentCart);
array_pop($cartItems);

$favItems = array();
$usernameee = $_SESSION['userid'];
foreach ($favoriteHandler->getFavorites("WHERE customer_id = '$usernameee'") as $favorite) {
    array_push($favItems, $favorite->getProductId());
}


if ($categoryId === "0") {
    $parameterSort = "";
    $headerSort = "";
} else {
    $categoryName = $productCategoryHandler->getProductCategoryFromId($categoryId);
    $parameterSort = "WHERE category = $categoryId ";
    $headerSort = "Sort by: " . $categoryName->getName();
}

$searchPhrase = $_POST['searchPhrase'];
if ($searchPhrase === "") {
    $parameterSearch = "";
    $headerSearch = "";
} else {
    $parameterSearch = "WHERE name LIKE '%$searchPhrase%' ";
    $headerSearch = "Search for: " . $searchPhrase;
}

$header = $headerSort . $headerSearch;
$productPrint = "<h2>" . $header . "</h2>";
$productPrint.= "<table class='table table-striped'><thead><tr><th>Code </th><th></th><th>Product </th><th>Add </th><th>Fav</th></tr></thead><tbody>";
$parameterLimit = "";
$parameter = $parameterSort . $parameterSearch . $parameterLimit . "WHERE active = 1";
foreach ($productHandler->getProducts($parameter) as $product) {
    $productPrint.= "<tr id='" . $product->getId() . "'>";
    $productPrint.= "<td class='clickMoreInfo' data-id='" . $product->getId() . "'>" . $product->getCode() . "</td>";
    $productPrint.= "<td class='clickMoreInfo' data-id='" . $product->getId() . "'><img src='gfx/productimg/" . $product->getCode() . "-sm.png' class='img-responsive'></td>";
    $productPrint.= "<td class='clickMoreInfo' data-id='" . $product->getId() . "'>" . $product->getName() . "</td>";
    $productPrint.= "<td><button class='btn btn-success' type='button' data-productid='" . $product->getId() . "' onclick='addProduct(this)'";
    if(in_array($product->getId(), $cartItems)){
        $productPrint.=  "disabled='disabled'";
    }
    $productPrint.= ">Add</button></td>";
    $productPrint.= "<td class=''><i class='fa fa-star fa-2x favoriteBtn ";
    if(in_array($product->getId(), $favItems)){
        $productPrint.=  "favBtnSelected'";
    } else {
        $productPrint.=  "'";        
    }
    $productPrint.= "' data-id='" . $product->getId() . "' aria-hidden='true'></i></td>";
    $productPrint.= "</tr>";
}

$productPrint.= "</tbody></table>";

$productPrint.= "<script>
            
        $('.favoriteBtn').click(function(){
            var productId = $(this).data('id');
            if($(this).hasClass('favBtnSelected')) {
                $(this).removeClass( 'favBtnSelected' );
                $.ajax({
                    type: 'POST',
                    url: 'php/unsetFavorite.php',
                    datatype: 'text',
                    data: {productId:productId},
                    success: function (result) {
                        
                    }
                });
            } else {
                $(this).addClass( 'favBtnSelected' );
                $.ajax({
                    type: 'POST',
                    url: 'php/setFavorite.php',
                    datatype: 'text',
                    data: {productId:productId},
                    success: function (result) {
                        
                    }
                });
            }                
        });
        var cartItemQuantity = [];
        function addProduct(a) {
            var productId = a.getAttribute('data-productid') + ',';
            
            var currentCart = sessionStorage.getItem('cartItemIds');
            if (currentCart === null) { currentCart = '' };
            console.log('oldItemIds: ' + currentCart);
            
            var currentQuan = sessionStorage.getItem('cartItemQuan');
            if (currentQuan === null) { currentQuan = '' };
            console.log('oldItemQuan: ' + currentQuan);
            
            var productIdTest = a.getAttribute('data-productid');
            $(a).attr('disabled','disabled');

            var testId = new RegExp(productIdTest);
            var exists = testId.test(currentCart);
            
            if(exists) {
                console.log('Exists!');
                pushAlreadyAddedProductNotification();
            } else {
                newCartItemIds = currentCart+productId;
                sessionStorage.setItem('cartItemIds', newCartItemIds);
                console.log('newItemIds: ' + sessionStorage.getItem('cartItemIds'));
                                
                newCartItemQuan = currentQuan + '1,';
                sessionStorage.setItem('cartItemQuan', newCartItemQuan);
                console.log('newItemQuan: ' + sessionStorage.getItem('cartItemQuan'));
                
                console.log(' ');

                pushAddProductNotification();
            }
        };
        
        $('.clickMoreInfo').click(function(){
            var productId = $(this).data('id');
            console.log(productId);
            
            $.ajax({
                type: 'POST',
                url: 'php/showProductInfo.php',
                datatype: 'text',
                data: {productId:productId},
                success: function (result) {
                    $('#containerProductDetails').html('');
                    
                    $(result).appendTo('#containerProductDetails');
                    $('#modalProductInfo').modal();
                }
            });
            
        });
        </script>";

echo $productPrint;