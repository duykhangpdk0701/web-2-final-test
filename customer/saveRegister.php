<?php
include_once "../connection.php";
include __DIR__ . "/../class/customer.php";

$fullname = $_POST["fullname"];
$password = $_POST["password"];
$address = $_POST["address"];
$city = $_POST["city"];



$cus = array("Fullname" => $fullname, "Password" => $password, "Address" => $address, "City" => $city);

$listCustomer = new Customer();
$listCustomer->add($cus);

header("location: ./login.php");
