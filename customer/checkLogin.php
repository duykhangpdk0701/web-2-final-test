<?php
include "../connection.php";
include "../class/customer.php";

$userId = $_POST["userID"];
$password = $_POST["password"];

$customer = new Customer();

if (!$customer->getByID($userId)) {
  header("location: ./login.php?error=idNotExist");
  exit();
} else if ($customer->getByID($userId)["Password"] !== $password) {
  header("location: ./login.php?error=passwordNotCorrect");
  exit();
}


session_start();
$_SESSION["CustomerID"] = $userId;
$_SESSION["Fullname"] = $customer->getByID($userId)["Fullname"];
header("location: ../vegetable/");
