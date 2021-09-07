<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/login.css">
  <title>Document</title>
</head>

<body>
  <section class="login-page">
    <form class="login-form" action="./checkLogin.php" method="POST">
      <h2>Login</h2>

      <?php
      if (isset($_GET["error"])) {
        $error = $_GET["error"];
        if ($error == "idNotExist") {
          echo '<div class="alert alert-danger" role="alert">Không tìm thấy tài khoản</div>';
        } else if ($error = "passwordNotCorrect") {
          echo '<div class="alert alert-danger" role="alert">Nhập sai passowrd</div>';
        }
      }

      ?>
      <div class="form-group">
        <label for="name">Your's ID:</label>
        <input type="text" class="form-control" id="name" name="userID" placeholder="Enter your ID" required>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      </div>

      <button type="submit" class="btn btn-primary">Login</button>
      <a href="../customer/register.php" class="btn btn-primary">Register</a>
    </form>
  </section>
</body>

</html>