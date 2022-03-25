<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include '../php/globals/conn.php';
include '../php/classes/favorite.php';

$favoriteHandler = new favorite($conn);

$customerId = $_SESSION['userid'];
$productId = $_POST['productId'];

$favoriteHandler->unsetFavorite($customerId,$productId);