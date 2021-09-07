<?php
include __DIR__ .  "/../connection.php";
include __DIR__ . "/../class/category.php";

$name = $_POST["name"];
$description = $_POST["description"];

$listCategory = new Category();
$newCategory = array("Name" => $name, "Description" => $description);

if (!$listCategory->add($newCategory)) {
  header("location: ./index.php?error=categoryExist");
  exit();
}

header("location: ./index.php?error=added");
exit();
