<?php

  include_once("../terket/functions/connection.php");
  include_once("../terket/functions/helper.php");

  $item_id = $_GET['item_id'];
  $task = isset($_GET['task']) ? $_GET['task'] : false;
  
  if($task) {
    if($_GET['task'] == "delete") {
      mysqli_query($connection, "DELETE FROM item WHERE item_id='$item_id'");
      echo "<h3 class='text-success text-center'>Data Deleted !</h3>";
      exit;
    }
  } else {
    $brand_id = $_POST['brand_id'];
    $name = $_POST['item'];
    $description = $_POST['desc'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $status = $_POST['status'];
    $button = $_POST['button'];
    $file_name = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], "../terket/images/item/".$file_name);
    
    if($button == "change") {
    $query = mysqli_query($connection, "UPDATE item SET brand_id='$brand_id', item_name='$name', description='$description', image='$file_name', price='$price', stock='$stock', status='$status' WHERE item_id='$item_id'");
    echo "<h3 class='text-success text-center'>Data Changed !</h3>";
  } else if($button == "add") {
    $query = mysqli_query($connection, "INSERT INTO item VALUES('', '$brand_id', '$name', '$description', '$file_name', '$price', '$stock', '$status')");
    echo "<h3 class='text-success text-center'>Data Added !</h3>";
  }
  }
  
?>