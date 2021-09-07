<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/register.css">
  <title>Document</title>
</head>

<body>
  <section class="register-page">
    <form class="register-form" action="./saveRegister.php" method="POST">
      <h2>Register</h2>
      <div class="form-group">
        <label for="exampleInputEmail1">Your's Fullname:</label>
        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your fullname" required>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Password:</label>
        <input type="password" class="form-control" id="password" minlength="6" name="password" placeholder="Password" required>
      </div>


      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
      </div>

      <div class="form-group">
        <label for="city">City:</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
      </div>

      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </section>

</body>

</html>