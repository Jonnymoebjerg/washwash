<?php

$cartItemIdsPost = $_POST['cartItemIds'];
$cartItemQuanPost = $_POST['cartItemQuan'];
$productId = $_POST['itemId'];
$countType = $_POST['countType'];

$cartItemIdsArray = explode(',', $cartItemIdsPost);
$cartItemIdsQuan = explode(',', $cartItemQuanPost);

$arrayNumber = array_search($productId,$cartItemIdsArray);

if ($countType === "minus") {
    if ($cartItemIdsQuan[$arrayNumber] === "1") {
        echo $cartItemQuanPost;
    } else {
        $arrayValue = $cartItemIdsQuan[$arrayNumber] - 1;
        $cartItemQuan = array($arrayNumber=>$arrayValue);
        $cartItemQuanUnArrayt = array_replace($cartItemIdsQuan,$cartItemQuan);

        $cartItemQuanUnArray = implode (",", $cartItemQuanUnArrayt);
        echo $cartItemQuanUnArray;
    }
} else {
    $arrayValue = $cartItemIdsQuan[$arrayNumber] + 1;
    $cartItemQuan = array($arrayNumber=>$arrayValue);
    $cartItemQuanUnArrayt = array_replace($cartItemIdsQuan,$cartItemQuan);
            
    $cartItemQuanUnArray = implode (",", $cartItemQuanUnArrayt);
    echo $cartItemQuanUnArray;
}

