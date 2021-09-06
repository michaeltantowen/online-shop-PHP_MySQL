<?php

  session_start();

  include_once("connection.php");
  include_once("helper.php");

  $user_id = $_SESSION['user_id'];
  $province_id = $_POST['province'];
  $name = $_POST['name'];
  $phone_number = $_POST['phone-number'];
  $address = $_POST['address'];
  $transaction_date = date("Y-m-d H:i:s");
  $status = 0;

  $insert_data = mysqli_query($connection, "INSERT INTO transaction VALUES('', '$user_id', '$province_id', '$name', '$phone_number', '$address', '$transaction_date', '$status')");

  if($insert_data) {
    $last_transaction_id = mysqli_insert_id($connection);
    $cart_item = query("SELECT * FROM cart WHERE user_id='$user_id'");
    foreach($cart_item as $item) {
      $data = mysqli_query($connection, "SELECT * FROM item WHERE item_id='$item[item_id]'");
      $value = mysqli_fetch_assoc($data);
      $item_id = $value['item_id'];
      $qty = $item['qty'];
      $price = $value['price'];
      mysqli_query($connection, "INSERT INTO order_item VALUES('$last_transaction_id', '$item_id', '$qty', '$price')");
    }
    mysqli_query($connection, "DELETE FROM cart WHERE user_id='$user_id'");
  }
  header("Location: " . BASE_URL . "index.php?page=transaction-detail&id=$last_transaction_id");
?>