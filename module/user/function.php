<?php

  include_once("../terket/functions/connection.php");
  include_once("../terket/functions/helper.php");

  $user_id = $_GET['user_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone_number = $_POST['phone_number'];
  $status = $_POST['status'];

  $query = mysqli_query($connection, "UPDATE user SET name='$name', email='$email', address='$address', phone_number='$phone_number', status='$status' WHERE user_id='$user_id'");

  echo "<h3 class='text-success text-center'>Data Changed !</h3>";

?>