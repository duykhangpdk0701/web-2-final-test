<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../">Market online</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">

        <a class="nav-link" href="../vegetable/">Vegetable</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../cart/">Cart</a>
      </li>

      <?php
      session_start();
      if (isset($_SESSION["CustomerID"])) {
        echo '<li class="nav-item"><a class="nav-link" href="../cart/history.php">History</a></li>';
        echo '<li class="nav-item"><a class="nav-link" href="../customer/logout.php">Log out</a></li>';
        echo '<li class="nav-item"><span class="btn btn-info" href="../cart/">' . $_SESSION["Fullname"] . '</span></li>';
      } else {
        echo '<li class="nav-item"><a class="nav-link" href="../customer/login.php">Log in</a></li>';
      }
      ?>
    </ul>
  </div>
</nav>