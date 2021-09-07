<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/cart.css">
  <title>Document</title>
</head>

<body>
  <?php
  include __DIR__ . "/../helper/menuChild.php";
  ?>
  <section class="cart-page">
    <form class="cart-wrapper" action="./saveorder.php" method="post">
      <h3>Cart</h3>

      <table class="table">
        <thead>
          <tr>
            <td scope="col">#</td>
            <td scope="col">Name</td>
            <td scope="col">Picture</td>
            <td scope="col">Amount</td>
            <td scope="col">Price</td>
          </tr>
        </thead>

        <tbody>
          <?php
          include __DIR__ . "/../class/vegetable.php";
          if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();
          } else {


            $listVegetable = new Vegetable();
            $countArray = array_count_values(($_SESSION["cart"]));
            $count = 0;
            $total = 0;
            foreach ($countArray as $key => $value) {
              $vegetable = $listVegetable->getByID($key);
              $count++;
              $totalPerVegetable = $vegetable["Price"] * $value;
              $total += $totalPerVegetable;
              echo ' <input type="hidden" name="VegetableID[]" value="' . $key . '">';
              echo ' <input type="hidden" name="amount[]" value="' . $value . '">';
              echo ' <input type="hidden" name="price[]" value="' . $vegetable["Price"] . '">';

              echo '<tr>';
              echo '  <td scope="row">' . $count . '</td>';
              echo '  <td>' . $vegetable["VegetableName"] . '</td>';
              echo '  <td class="cart-image-container"><img class="cart-image" src="' . $vegetable["Image"] . '" alt=""></td>';
              echo '  <td>' . $value . '</td>';
              echo '  <td>' . $vegetable["Price"] . '</td>';
              echo '</tr>';
              echo '<tr>';
              echo '  <td scope="row"></td>';
              echo '  <td></td>';
              echo '  <td class="cart-image-container"></td>';
              echo '  <td>' . $value . '</td>';
              echo '  <td>' . $totalPerVegetable . '</td>';
              echo '</tr>';
            }
            echo '<tr>';
            echo '  <td scope="row"></td>';
            echo '  <td></td>';
            echo '  <td class="cart-image-container">Total:</td>';
            echo '  <td></td>';
            echo '  <td>' . $total . '</td>';
            echo '</tr>';
            echo ' <input type="hidden" name="total" value="' . $total . '">';
          }

          ?>
        </tbody>
      </table>
      <button type="submit" class="btn btn-danger">Order</button>
    </form>
  </section>


</body>

</html>