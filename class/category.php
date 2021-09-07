<?php

class Category
{

  private $listCategory = [];

  public function __construct()
  {

    include __DIR__ . "/../connection.php";
    $sql = "SELECT * FROM category";
    $result = $conn->query($sql) or die("query fail");

    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        array_push($this->listCategory, $row);
      }
    }

    $conn->close();
  }


  public function getAll()
  {
    return $this->listCategory;
  }


  public function isExist($cate)
  {

    foreach ($this->listCategory as $key => $value) {
      if ($cate["Name"] == $value["Name"]) {
        return true;
      }
    }
    return false;
  }

  public function add($cate)
  {
    if ($this->isExist($cate)) {
      return false;
    }

    include __DIR__ . "/../connection.php";

    $categoryName = $cate["Name"];
    $categoryDescription = $cate["Description"];
    $sql = "INSERT INTO `category`(`Name`, `Description`) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $categoryName, $categoryDescription);
    $stmt->execute() or die('execute fail');

    $stmt->close();
    $conn->close();
    return true;
  }
}
