<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/vegetable.css">
  <title>Document</title>
</head>

<body>
  <?php
  include __DIR__ . "/../helper/menuChild.php";
  ?>
  <section class="vegetable-page">
    <div class="vegetable-wrapper">

      <div class="filter-vegetable">
        <form action="./index.php" method="post">
          <h4>Category Name:</h4>

          <?php
          if (isset($_GET["error"])) {

            if ($_GET["error"] == "nothingInCart") {
              echo '<script>alert("Hãy thêm vào giỏ hàng sản phẩm")</script>';
            } else if ($_GET["error"] == "added") {
              echo '<script>alert("Đã thêm sản phẩm vào giỏ hàng")</script>';
            } else if ($_GET["error"] == "bought") {
              echo '<script>alert("Đã mua sản phẩm")</script>';
            } else if ($_GET["error"] == "outOfStock") {
              echo '<script>alert("Sản phẩm đã hết hàng")</script>';
            } else if ($_GET["error"] == "overAmount") {
              echo '<script>alert("Sản phẩm không cung cấp đủ số lượng")</script>';
            }
          }

          include_once __DIR__ . "/../class/category.php";
          $listCategory = new category();

          foreach ($listCategory->getAll() as $key => $value) {
            echo '<div class="checkbox-wrapper">';
            echo '<input type="checkbox" name="category[]" value="' . $value["CategoryID"] . '" id="' . $value["Name"] . '">';
            echo '<label for="' . $value["Name"] . '">' . $value["Name"] . '</label>';
            echo '</div>';
          }
          ?>
          <button type="submit" class="btn btn-danger">Filter</button>
        </form>
      </div>

      <div class="list-vegetable">
        <?php
        include_once "../class/vegetable.php";
        $listVegetable = new Vegetable();


        if (isset($_POST["category"])) {
          $result = $listVegetable->getListByCateIDs($_POST["category"]);
        } else {
          $result = $listVegetable->getAll();
        }

        foreach ($result as $key => $value) {
          echo '<form action="./addToCart.php" method="post" class="item-vegetable card">';
          echo '  <input type="hidden" name="cart" value="' . $value["VegetableID"] . '">';
          echo '  <img class="card-img-top" src="' . $value["Image"] . '" alt="">';
          echo '  <div class="info-vegetable card-body">';
          echo '     <p>' . $value["VegetableName"];
          echo '       <span class="badge badge-warning text-white">' . number_format($value["Price"], 0, '', '.') . '</span>';
          echo '     </p>';
          echo '     <button type="submit" class="btn btn-danger">Buy</button>';
          echo '  </div>';
          echo '</form>';
        }


        ?>
      </div>
    </div>
  </section>
</body>

</html>