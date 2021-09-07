<?php


class Customer
{
  public $listCustomer = [];

  public function __construct()
  {
    include __DIR__ . "/../connection.php";
    $sql = "SELECT * FROM customers";
    $result = $conn->query($sql) or die("query fail");

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($this->listCustomer, $row);
      }
    }
  }

  public function getByID($cusid)
  {
    foreach ($this->listCustomer as $value) {
      if ($value["CustomerID"] == $cusid) {
        $result = $value;
        return $result;
      }
    };
    return false;
  }

  public function add($cus)
  {
    include __DIR__ . "/../connection.php";
    $sql = "INSERT INTO `customers`(`Password`, `Fullname`, `Address`, `City`) VALUES (?,?,?,?)";
    print_r($cus);

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $cus["Password"], $cus["Fullname"], $cus["Address"], $cus["City"]) or die('bind param fail');

    $stmt->execute() or die('execute fail');

    $stmt->close();
    $conn->close();
  }
}
