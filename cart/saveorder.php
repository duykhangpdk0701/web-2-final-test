<?php

session_start();
if (!isset($_SESSION["CustomerID"])) {
  header("location: ../customer/login.php");
  exit();
}

include __DIR__ . "/../class/order.php";

date_default_timezone_set("Asia/Ho_Chi_Minh");
$today = date("Y-m-d H:i:s");

if (!isset($_POST["VegetableID"])) {
  header("location: ../vegetable/index.php?error=nothingInCart");
  exit();
}

$listVegetableIDPost = $_POST["VegetableID"];
$listVegetableAmountPost = $_POST["amount"];
$listVegetableTotalPost = $_POST["total"];
$listVegetablePricePost = $_POST["price"];

$order = array(
  "CustomerID" => $_SESSION["CustomerID"],
  "Date" => $today,
  "Total" => $listVegetableTotalPost,
  "Note" => null
);

$orderDetail = [];
foreach ($listVegetableIDPost as $key => $value) {

  $newArr = array(
    "VegetableID" => $listVegetableIDPost[$key],
    "Quantity" => $listVegetableAmountPost[$key],
    "Price" => $listVegetablePricePost[$key]
  );

  array_push($orderDetail, $newArr);
}

$listOrder = new Order();
$listOrder->addOrder($order, $orderDetail);

header("location: ../cart/history.php?error=bought");
