<?php

  session_start();

  include_once("helper.php");
  include_once("connection.php");

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $re_password = $_POST['re_password'];
  $address = $_POST['address'];
  $phone_number = $_POST['phone_number'];

  unset($_POST['password']);
  unset($_POST['re_password']);

  $data = http_build_query($_POST);

  $cekEmail = mysqli_query($connection, "SELECT * FROM user WHERE email='$email'");

  if(mysqli_num_rows($cekEmail) > 0) {
    header("Location: ". BASE_URL . "index.php?page=login-register&notif=email&$data");
    exit;
  }
  if($password !== $re_password) {
    header("Location: ". BASE_URL . "index.php?page=login-register&notif=password&$data");
    exit;
  }
  $password = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($connection, "INSERT INTO user VALUES('', '$name', '$email', '$address', '$phone_number', '$password', 'active')");
  header("Location: ".BASE_URL."index.php?page=login-register&notif=success-create");
  exit;

?>