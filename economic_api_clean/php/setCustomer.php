<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conn.php';
include 'customers.php';

$customerHandler = new customers($conn);

$customerNumber = (isset($_POST['customerNumber']) ? $_POST['customerNumber'] : null);
$currency = (isset($_POST['currency']) ? $_POST['currency'] : null);
$paymentTermsNumber = (isset($_POST['paymentTermsNumber']) ? $_POST['paymentTermsNumber'] : null);
$customerGroup = (isset($_POST['customerGroup']) ? $_POST['customerGroup'] : null);
$address = (isset($_POST['address']) ? $_POST['address'] : null);
$balance = (isset($_POST['balance']) ? $_POST['balance'] : null);
$dueAmount = (isset($_POST['dueAmount']) ? $_POST['dueAmount'] : null);
$city = (isset($_POST['city']) ? $_POST['city'] : null);
$country = (isset($_POST['country']) ? $_POST['country'] : null);
$email = (isset($_POST['email']) ? $_POST['email'] : null);
$name = (isset($_POST['name']) ? $_POST['name'] : null);
$zip = (isset($_POST['zip']) ? $_POST['zip'] : null);
$telephoneAndFaxNumber = (isset($_POST['telephoneAndFaxNumber']) ? $_POST['telephoneAndFaxNumber'] : null);
$vatZone = (isset($_POST['vatZone']) ? $_POST['vatZone'] : null);

$customerHandler->setCustomer($customerNumber,$currency,$paymentTermsNumber,$customerGroup,$address,$balance,$dueAmount,$city,$country,$email,$name,$zip,$telephoneAndFaxNumber,$vatZone);

echo "<br><hr><br>" .  $customerNumber . " | " . $currency . " | " . $paymentTermsNumber . " | " . $customerGroup . " | " . $address . " | " . $balance . " | " . $dueAmount . " | " . $city . " | " . $country . " | " . $email . " | " . $name . " | " . $zip . " | " . $telephoneAndFaxNumber . " | " . $vatZone;