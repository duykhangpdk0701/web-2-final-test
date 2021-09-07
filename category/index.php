<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/category.css">
  <title>Document</title>
</head>

<body>
  <section class="category-page">
    <?php
    include __DIR__ . "/../helper/menuChild.php";
    ?>
    <div class="category-wrapper">
      <div class="category-form">
        <form action="./add.php" method="post">
          <div class="form-group">
            <label for="description">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name" required>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="description" required>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
      <div class="category-info">
        <h3>Category</h3>
        <table class="table">
          <thead>
            <tr>
              <td scope="col">#</td>
              <td scope="col">Name</td>
              <td scope="col">Description</td>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_GET["error"])) {

              if ($_GET["error"] == "categoryExist") {
                echo '<script>alert("Category đã tồn tại")</script>';
              } elseif ($_GET["error"] == "added") {
                echo '<script>alert("Đã thêm Category")</script>';
              }
            }

            include __DIR__ . "/../class/category.php";
            $listCategoryID = new Category();
            $result = $listCategoryID->getAll();

            foreach ($result as  $value) {
              echo '<tr>';
              echo '  <td scope="col">' . $value["CategoryID"] . '</td>';
              echo '  <td scope="col">' . $value["Name"] . '</td>';
              echo '  <td scope="col">' . $value["Description"] . '</td>';
              echo '</tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</body>

</html>