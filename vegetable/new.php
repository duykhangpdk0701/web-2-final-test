<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/vegetableNew.css">
  <title>Document</title>
</head>

<body>
  <section class="new-page">
    <div class="new-wrapper">
      <form action="./add.php" enctype="multipart/form-data" method="post">
        <div class="form-row">
          <div class="form-group col-md-8">
            <label for="inputEmail4">Vegetable Name:</label>
            <input type="text" class="form-control" id="vegetable-name" name="vegetable-name" required>
          </div>
          <div class="form-group col-md-4">
            <label for="inputPassword4">Category Name:</label>
            <select class="form-control" id="category-name" name="category-name" required>
              <?php
              if (isset($_GET["error"])) {
                $error = $_GET["error"];
                if ($error == "notUpload") {
                  echo '<script>alert("File Không đươc upload")</script>';
                } else if ($error == "VegetableNameExist") {
                  echo '<script>alert("Tên sản phẩm đã tồn tại")</script>';
                } else if ($error == "failToUploadFile") {
                  echo '<script>alert("upload file lỗi")</script>';
                } else if ($error == "uploaded") {
                  echo '<script>alert("Sản phẩm đã được thêm")</script>';
                }
              }

              include __DIR__ .  "/../class/category.php";
              $listCategory = new Category();
              foreach ($listCategory->getAll() as $value) {
                echo '<option value=' . $value["CategoryID"] . '>' . $value["Name"] . '</option>';
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputEmail4">Unit:</label>
            <input type="text" class="form-control" name="unit" id="unit" required>
          </div>
          <div class="form-group col-md-4">
            <label for="amount">Amount:</label>
            <input type="number" min="0" class="form-control" name="amount" id="amount" required>
          </div>
          <div class="form-group col-md-4">
            <label for="price">Price:</label>
            <input type="number" min="0" class="form-control" name="price" id="inputPassword4" required">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file upload-file" id="image" name="image" accept="image/png, image/jpg" required>
          </div>

        </div>

        <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
  </section>
  <script src="./handleUpload.js"></script>
</body>

</html>