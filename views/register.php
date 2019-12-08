<?php
include_once('layouts/header.php');
session_start();

var_dump($_SESSION);
if (isset($_SESSION['username'])) {
  header("Location: index.php");
}
?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
            <form class="form-signin" action="../controller/User/register.php" method="POST">
              <div class="form-label-group">
                <label for="username">Username</label>
                <input name="username" type="text" id="username" class="form-control" placeholder="Username" required autofocus>
              </div>

              <div class="form-label-group">
                <label for="password">Password</label>
                <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
              </div>

              <div class="form-label-group">
                <label for="password">Confirm Password</label>
                <input name="confirmPassword" type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password" required>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
              <hr class="my-4">
              <div align="center"><a href="login.php">Log in</a></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
