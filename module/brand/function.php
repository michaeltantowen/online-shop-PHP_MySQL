<?php

  include_once("../terket/functions/connection.php");
  include_once("../terket/functions/helper.php");

  $brand_id = $_GET['brand_id'];
  if(isset($_GET['task'])) {
    if($_GET['task'] == "delete") {
      mysqli_query($connection, "DELETE FROM brand WHERE brand_id='$brand_id'");
      echo "<h3 class='text-success text-center'>Data Deleted !</h3>";
      exit;
    }
  } else {
    $brand_name = $_POST['brand_name'];
    $status = $_POST['status'];
    $button = $_POST['button']; 
    if($button == "change") {
      $query = mysqli_query($connection, "UPDATE brand SET brand_name='$brand_name', status='$status' WHERE brand_id='$brand_id'");
      echo "<h3 class='text-success text-center'>Data Changed !</h3>";
    } else if($button == "add") {
      $query = mysqli_query($connection, "INSERT INTO brand VALUES('', '$brand_name', '$status')");
      echo "<h3 class='text-success text-center'>Data Added !</h3>";
    }
  }

?>