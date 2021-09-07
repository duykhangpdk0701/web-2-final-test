<?php

$vegetableName =  $_POST["vegetable-name"];
$categoryName = $_POST["category-name"];
$unit = $_POST["unit"];
$amount = $_POST["amount"];
$price = $_POST["price"];

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;

include __DIR__ . "/../class/vegetable.php";
$listVegetable = new Vegetable();

if ($listVegetable->isExistVegetable($vegetableName)) {
  header("location: ./new.php?error=VegetableNameExist");
  exit();
}

$vegetable = array(
  "CategoryID" => $categoryName,
  "VegetableID" => $vegetableName,
  "Unit" => $unit,
  "Amount" => $amount,
  "Price" => $price
);

$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check !== false) {
  $uploadOk = 1;
} else {
  $uploadOk = 0;
}

$extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

if ($uploadOk == 0) {
  header("location: ./new.php?error=notUpload");
  exit();
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $vegetableName . "." . $extension)) {
  } else {
    header("location: ./new.php?error=failToUploadFile");
    exit();
  }
}


$vegetable = array(
  "CategoryID" => $categoryName,
  "VegetableName" => $vegetableName,
  "Unit" => $unit,
  "Amount" => $amount,
  "Image" => $target_file,
  "Price" => $price
);

$listVegetable->addVegetable($vegetable);

header("location: ./new.php?error=uploaded");
exit();
