<?php
  session_start();
  $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
  
  include_once("connection.php");
  include_once("helper.php");
  
  if(!$user_id) {
    header("Location: " . BASE_URL . "index.php?page=login-register");
  }
  
  $user_id = $_SESSION['user_id'];
  $item_id = $_GET['item_id'];
  $qty = isset($_GET['qty']) ? $_GET['qty'] : 1;

  $check_item = mysqli_query($connection, "SELECT * FROM cart WHERE user_id='$user_id' AND item_id='$item_id'");
  if(mysqli_num_rows($check_item) > 0) {
    mysqli_query($connection, "UPDATE cart SET qty='$qty' WHERE user_id='$user_id' AND item_id='$item_id'");
  } else {
    mysqli_query($connection, "INSERT INTO cart VALUES('', '$user_id', '$item_id', '$qty')");
  }

  header("Location: ". BASE_URL . "index.php?page=my-cart");
?>