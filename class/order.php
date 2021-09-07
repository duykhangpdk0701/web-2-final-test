<?php

class Order
{
  private $listOrder = [];

  public function __construct()
  {
    include __DIR__ . "/../connection.php";
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql) or die("query fail");

    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        array_push($this->listOrder, $row);
      }
    }

    $conn->close();
  }

  public function getAll()
  {
    return $this->listOrder;
  }

  public function getAllOrder($cusID)
  {
    $arr = [];
    foreach ($this->listOrder as $value) {
      if ($value["CustomerID"] == $cusID) {
        array_push($arr, $value);
      }
    }
    return $arr;
  }

  public function getOrder($orderID)
  {
    foreach ($this->listOrder as $value) {
      if ($value["OrderID"] == $orderID) {
        return $value;
      }
    }
    return false;
  }

  public function getOrderDetail($orderID)
  {
    $listOrderDetail = [];
    include __DIR__ . "/../connection.php";
    $sql = "SELECT * FROM orderdetail";
    $result = $conn->query($sql) or die("query fail");

    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        array_push($listOrderDetail, $row);
      }
    }
    $conn->close();

    $arr = [];
    foreach ($listOrderDetail as $value) {
      if ($value["OrderID"] == $orderID) {
        array_push($arr, $value);
      }
    }
    return $arr;
  }

  public function addOrderDetail($detail)
  {
    include __DIR__ .  "/../connection.php";

    $reloadListID = new Order();
    $lastOrderID = ($reloadListID->getAll())[count($reloadListID->getAll()) - 1]["OrderID"];
    $sql = "INSERT INTO `orderdetail`(`OrderID`, `VegetableID`, `Quantity`, `Price`) VALUES (?,?,?,?)";
    $stmt = $conn->prepare(($sql));
    $stmt->bind_param('ssss', $lastOrderID, $detail["VegetableID"], $detail["Quantity"], $detail["Price"]);
    $stmt->execute();

    $stmt->close();
    $conn->close();
    return $stmt;
  }

  public function addOrderChild($order)
  {
    include __DIR__ .  "/../connection.php";
    $sql = "INSERT INTO `orders`(`CustomerID`, `Date`, `Total`, `Note`) VALUES (?,?,?,?)";
    $stmt = $conn->prepare(($sql));
    $stmt->bind_param('ssss', $order["CustomerID"], $order["Date"], $order["Total"], $order["Note"]);
    $stmt->execute() or false;

    $stmt->close();
    $conn->close();

    return $stmt;
  }


  public function addOrder($order, $detail)
  {
    $_SESSION["cart"] = [];

    $this->addOrderChild($order);
    include __DIR__ . "/../class/vegetable.php";
    $listVegetable = new Vegetable();

    foreach ($detail as $key => $value) {
      if (!$listVegetable->reducerAmount($value["VegetableID"])) {
        header("location: ../vegetable/index.php?error=overAmount");
        exit();
      }
      $this->addOrderDetail($value);
    }
  }
}
