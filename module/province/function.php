<?php

  include_once("../terket/functions/connection.php");
  include_once("../terket/functions/helper.php");

  $province_id = $_GET['province_id'];
  
  if(isset($_GET['task'])) {
    if($_GET['task'] == "delete") {
      mysqli_query($connection, "DELETE FROM province WHERE province_id='$province_id'");
      echo "<h3 class='text-success text-center'>Data Deleted !</h3>";
      exit;
    }
  } else {
    $province_name = $_POST['province_name'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $button = $_POST['button'];
    if($button == "change") {
      $query = mysqli_query($connection, "UPDATE province SET province_name='$province_name', price='$price', status='$status' WHERE province_id='$province_id'");
      echo "<h3 class='text-success text-center'>Data Changed !</h3>";
    } else if($button == "add") {
      $query = mysqli_query($connection, "INSERT INTO province VALUES('', '$province_name', '$price', '$status')");
      echo "<h3 class='text-success text-center'>Data Added !</h3>";
    }
  }
    
?>