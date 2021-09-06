<?php

  include_once("connection.php");
  include_once("helper.php");

  $transaction_id = $_GET['transaction_id'];
  $file_name = $_FILES['file']['name'];
  move_uploaded_file($_FILES['file']['tmp_name'], "../images/payment/"."($transaction_id)".$file_name);

  mysqli_query($connection, "UPDATE transaction SET status='1' WHERE transaction_id='$transaction_id'");
  header("Location: " . BASE_URL . "index.php?page=track-order");
?>