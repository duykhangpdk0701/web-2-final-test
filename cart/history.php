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
  <?php
  include __DIR__ . "/../helper/menuChild.php";
  ?>
  <section class="history-page">
    <div class="history-wrapper">
      <h3>History</h3>
      <table class="table">
        <thead>
          <tr>
            <td scope="col">#</td>
            <td scope="col">Date</td>
            <td scope="col">Total</td>
            <td scope="col">Detail</td>
          </tr>
        </thead>
        <tbody>
          <?php
          include __DIR__ . "/../class/order.php";
          $listOrder = new Order();
          $count = 0;
          $CustomerID = $_SESSION["CustomerID"];

          foreach ($listOrder->getAllOrder($CustomerID) as $value) {
            echo '<tr>';
            echo '  <td scope="row">' . $value["OrderID"] . '</td>';
            echo '  <td>' . $value["Date"] . '</td>';
            echo '  <td>' . $value["Total"] . '</td>';
            echo '  <td> <a class="btn btn-info" href="../cart/detail.php?orderID=' . $value["OrderID"] . '">Detail</a></td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>
</body>

</html>