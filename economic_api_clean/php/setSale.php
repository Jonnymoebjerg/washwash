<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conn.php';
include 'customers.php';

$salesHandler = new sales($conn);

$invoiceNumber = (isset($_POST['invoiceNumber']) ? $_POST['invoiceNumber'] : null);
$date = (isset($_POST['date']) ? $_POST['date'] : null);
$customerNumber = (isset($_POST['customerNumber']) ? $_POST['customerNumber'] : null);
$grossAmount = (isset($_POST['grossAmount']) ? $_POST['grossAmount'] : null);

$salesHandler->setSale($invoiceNumber,$date,$customerNumber,$grossAmount);
