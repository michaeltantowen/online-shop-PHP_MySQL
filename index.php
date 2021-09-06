<?php
  session_start();

  include_once("functions/connection.php");
  include_once("functions/helper.php");

  $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
  $page = isset($_GET['page']) ? $_GET['page'] : false;

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="<?= BASE_URL."js/jquery-3.6.0.min.js"; ?>"></script>
    <script src="<?= BASE_URL."js/slidesjs-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= BASE_URL."css/style.css"; ?>">
    <link rel="stylesheet" href="<?= BASE_URL."css/banner.css"; ?>">
    <script>
      $(function() {
        $('#slides').slidesjs({
          play: {
            auto : true,
            interval : 3000
          },
          navigation : false
        });
      });
    </script>

    <link rel="shortcut icon" href="<?= BASE_URL."images/assets/small-logo.png" ?>" type="image/png">
    <title>Terket | One Stop Solution For Tech Shopping</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-lg">
        <a class="navbar-brand" href="<?= BASE_URL ?>">
          <img src="<?= BASE_URL."images/assets/large-logo.png" ?>" alt="Terker | One Stop Solution For Tech Shopping">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link <?php if(!$page) echo "active" ?>" href="<?= BASE_URL."index.php" ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if($page == "products") echo "active" ?>" href="<?= BASE_URL."index.php?page=products" ?>">Products</a>
            </li>
          </div>
          <div class="navbar-nav">
            <?php
              if($user_id) {
                echo "
                <a class='nav-link' href='".BASE_URL."index.php?page=logout'>
                <button type='button' class='btn btn-outline-danger'>Logout</button>
                </a>
                <a class='nav-link' href='".BASE_URL."index.php?page=profile'>
                <button type='button' class='btn btn-outline-info'>My Profile</button>
                </a>
                ";
                if($user_id == 1) {
                  echo "
                  <a class='nav-link' href='".BASE_URL."index.php?page=manage'>
                  <button type='button' class='btn btn-outline-info'>Manage</button>
                  </a>
                  ";
                } else {
                  echo "
                  <a class='nav-link' href='".BASE_URL."index.php?page=my-cart'>
                  <button type='button' class='btn btn-outline-info'>My Cart</button>
                  </a>
                  ";
                }
              } else {
                echo "
                <a class='nav-link' href='".BASE_URL."index.php?page=login-register'>
                <button type='button' class='btn btn-outline-info'>Login / Register</button>
                </a>
                ";
              }
            ?>
          </div>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <?php
      if($page) {
        $targetFile = $page . ".php";
        if(file_exists($targetFile)) {
          include_once($targetFile);
        } else {
          echo "
            <h1 class='text-center text-danger mt-5'>Page Not Found !</h1>
          ";
        }
      } else {
        include_once("main.php");
      }
    ?>

    <!-- Footer -->
    <footer>
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <div class="container-lg">
          <a class="navbar-brand" href="#">
            <img src="<?= BASE_URL."images/assets/small-logo.png" ?>" width="100" height="100">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link text-info" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                </svg>
              </a>
              <a class="nav-link text-info" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                  <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                </svg>
              </a>
              <a class="nav-link text-info" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                   <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </footer>
    <!-- End Footer -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="<?= BASE_URL."js/script.js" ?>"></script>
  </body>
</html>