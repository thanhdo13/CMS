
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">Trang Chủ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto" id="nav-list">
        <?php
        if (isset($_SESSION['username'])){
          echo "<li class='nav-item active'><a class='nav-link' href='newPost.php'>Bài Mới </a> </li>";
          echo "<li class='nav-item active'><a class='nav-link' href='../controller/User/logout.php'>Đăng Xuất ( ". $_SESSION['username']." ) </a> </li>";
        }
        else echo "<li class='nav-item active'><a class='nav-link' href='login.php'>Đăng Nhập </a> </li>";
        ?>
      </ul>
    </div>
  </div>
</nav>
