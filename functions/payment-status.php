<?php

  include_once("connection.php");
  include_once("helper.php");

  $transaction_id = $_GET['transaction_id'];
  $status = $_POST['status'];

  mysqli_query($connection, "UPDATE transaction SET status='$status' WHERE transaction_id='$transaction_id'");
  header("Location: " . BASE_URL . "index.php?page=manage&module=order&action=list");
?>