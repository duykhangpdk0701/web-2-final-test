<?php

class Vegetable
{
  private $listVegetable = [];

  public function __construct()
  {
    include __DIR__ . "/../connection.php";
    $sql = "SELECT * FROM vegetable";
    $result = $conn->query($sql) or die("query fail");

    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        array_push($this->listVegetable, $row);
      }
    }

    $conn->close();
  }


  public function getAll()
  {
    return $this->listVegetable;
  }

  public function isExistVegetable($name)
  {
    foreach ($this->listVegetable as $value) {
      if (strtolower($value["VegetableName"]) === strtolower($name)) {
        return true;
      }
    }
    return false;
  }

  public function isAvailable($vegetableID)
  {
    foreach ($this->listVegetable as $value) {
      if ($value["VegetableID"] === $vegetableID) {
        if ($value["Amount"] > 0) {
          return true;
        }
        return false;
      }
    }
  }

  public function reducerAmount($vegetableID , $amountReduce)
  {
    $vegetableAmount =(int)$this->getByID($vegetableID)["Amount"] - (int)$amountReduce;
    include __DIR__ .  "/../connection.php";
    $sql = "UPDATE `vegetable` SET `Amount` = $vegetableAmount  WHERE `VegetableID` = $vegetableID";
    if ($conn->query($sql) === TRUE) {
      return true;
    } else {
      return false;
    }
  }

  public function addVegetable($vegetableItem)
  {
    include __DIR__ .  "/../connection.php";
    $sql = "INSERT INTO `vegetable`( `CategoryID`, `VegetableName`, `Unit`, `Amount`, `Image`, `Price`) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare(($sql));
    $stmt->bind_param('ssssss', $vegetableItem["CategoryID"], $vegetableItem["VegetableName"], $vegetableItem["Unit"], $vegetable["Amount"], $vegetable["Image"], $vegetable["Price"]);
    $stmt->execute();

    $stmt->close();
    $conn->close();
    return $stmt;
  }

  public function getByID($vegetableID)
  {
    foreach ($this->listVegetable as $key => $value) {
      if ($value["VegetableID"] == $vegetableID) {
        return $value;
      }
    }
    return false;
  }


  public function getListByCateID($cateid)
  {
    foreach ($this->listVegetable as $key => $value) {
      if ($value["CategoryID"] == $cateid) {
        return $value;
      }
    }
    return false;
  }


  public function getListByCateIDs($cateids)
  {
    $arr = [];

    foreach ($this->listVegetable as $key => $value) {
      if (in_array($value["CategoryID"],  $cateids)) {
        array_push($arr, $value);
      }
    }
    return $arr;
  }
}
