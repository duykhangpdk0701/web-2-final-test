<?php
include __DIR__ . "/../class/vegetable.php";

session_start();
if (!isset($_SESSION["cart"])) {
  $_SESSION["cart"] = array();
}

$item = $_POST["cart"];
$listVegetable = new Vegetable();

if (!$listVegetable->isAvailable($item)) {
  header("location: ../vegetable/index.php?error=outOfStock");
  exit();
}

foreach (array_count_values($_SESSION["cart"]) as $key => $value) {
  echo "$key => $value <br/>";
  if($item  == $key){
    $listVegetable->getByID($key)["Amount"];
    if($value > $listVegetable){
      header("location: ../vegetable/index.php?error=outOfStock");
      exit();
    }
  }
}

array_push($_SESSION["cart"], $item);



header("location: ../vegetable/index.php?error=added");
