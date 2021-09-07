<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/history.css">
  <title>Document</title>
</head>

<body>
  <section class="history-page">
    <div class="history-wrapper">
      <h3>Order detail</h3>
      <table class="table">
        <thead>
          <tr>
            <td scope="col">#</td>
            <td scope="col">Name</td>
            <td scope="col">Image</td>
            <td scope="col">Amount</td>
            <td scope="col">Price</td>
          </tr>
        </thead>
        <tbody>
          <?php
          include __DIR__ . "/../class/order.php";
          include __DIR__ . "/../class/vegetable.php";
          session_start();
          $listOrder = new Order();
          $listVegetable = new Vegetable();
          $orderID = $_GET["orderID"];
          $customerID = $_SESSION["CustomerID"];
          $arrOrderID = [];
          $count = 0;
          $total = 0;

          foreach ($listOrder->getOrderDetail($orderID) as $key => $value) {
            $total += $value["Quantity"] * $value["Price"];
            $vegetable = $listVegetable->getByID($value["VegetableID"]);
            echo '<tr>';
            echo '  <td scope="row">' . ++$count . '</td>';
            echo '  <td scope="row">' . $vegetable["VegetableName"] . '</td>';
            echo '  <td scope="row"> <img class="history-image" src="' . $vegetable["Image"] . '" alt=""></td>';
            echo '  <td scope="row">' . $value["Quantity"] . '</td>';
            echo '  <td scope="row">' . $value["Price"] . '</td>';
            echo '</tr>';
          }
          echo '<tr>';
          echo '  <td scope="row"></td>';
          echo '  <td scope="row"></td>';
          echo '  <td scope="row">Total:</td>';
          echo '  <td scope="row"></td>';
          echo '  <td scope="row">' . $total . '</td>';
          echo '</tr>';
          ?>
        </tbody>
      </table>

    </div>
  </section>
</body>

</html>