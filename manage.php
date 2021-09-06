<?php

  $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

  include_once("functions/helper.php");

  if(!$user_id) {
    header("Location: " . BASE_URL . "index.php?page=login-register");
  } else if($user_id && $user_id != '1') {
    header("Location:" . BASE_URL . "index.php");
  }

  $module = isset($_GET['module']) ? $_GET['module'] : false;
  $action = isset($_GET['action']) ? $_GET['action'] : false;

?>

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-lg">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#manage-markUp" aria-controls="manage-markUp" aria-expanded="false" aria-label="Toggle navigation">
      Manage
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="manage-markUp">
      <div class="navbar-nav mx-auto">
        <a class="nav-link text-lg-center ps-lg-5 pe-lg-5" aria-current="page" href="<?= BASE_URL."index.php?page=manage&module=user&action=list" ?>">Manage Users</a>
        <a class="nav-link text-lg-center ps-lg-5 pe-lg-5" href="<?= BASE_URL."index.php?page=manage&module=brand&action=list" ?>">Manage Brands</a>
        <a class="nav-link text-lg-center ps-lg-5 pe-lg-5" href="<?= BASE_URL."index.php?page=manage&module=item&action=list" ?>">Manage Items</a>
        <a class="nav-link text-lg-center ps-lg-5 pe-lg-5" href="<?= BASE_URL."index.php?page=manage&module=province&action=list" ?>">Manage Provinces</a>
        <a class="nav-link text-lg-center ps-lg-5 pe-lg-5" href="<?= BASE_URL."index.php?page=manage&module=banner&action=list" ?>">Manage Banners</a>
        <a class="nav-link text-lg-center ps-lg-5 pe-lg-5" href="<?= BASE_URL."index.php?page=manage&module=order&action=list" ?>">Manage Orders</a>
      </div>
    </div>
  </div>
</nav>

<?php
  $targetFile = "module/$module/$action.php";
  if(file_exists($targetFile)) {
    include_once($targetFile);
  } else {
    echo "<h3 class='text-center text-danger m-5'>Page Not Found !</h3>";
  }
?>