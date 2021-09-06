<?php

  session_start();

  include_once("helper.php");
  include_once("function.php");

  $user_id = $_SESSION['user_id'];
  $item_id = $_GET['item_id'];

  mysqli_query($connection, "DELETE FROM cart WHERE user_id='$user_id' AND item_id='$item_id'");

  header("Location: " . BASE_URL . "index.php?page=my-cart");

?>