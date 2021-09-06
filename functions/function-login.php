<?php

  session_start();

  include_once("helper.php");
  include_once("connection.php");

  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = mysqli_query($connection, "SELECT * FROM user WHERE email='$email' AND status='active'");

  if(mysqli_num_rows($query) === 1) {
    $data = mysqli_fetch_assoc($query);
    if(password_verify($password, $data['password'])) {
      $_SESSION['user_id'] = $data['user_id'];
      $_SESSION['name'] = $data['name'];
      header("Location: ".BASE_URL."index.php");
      exit;
    } else {
      header("Location: ".BASE_URL."index.php?page=login-register&notif=fail");
    }
  } else {
      header("Location: ".BASE_URL."index.php?page=login-register&notif=fail");
  }

?>