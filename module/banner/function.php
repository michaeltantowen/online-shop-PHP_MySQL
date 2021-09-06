<?php

  include_once("../terket/functions/connection.php");
  include_once("../terket/functions/helper.php");

  $banner_id = $_GET['banner_id'];
  
  if(isset($_GET['task'])) {
    if($_GET['task'] == "delete") {
      mysqli_query($connection, "DELETE FROM banner WHERE banner_id='$banner_id'");
      echo "<h3 class='text-success text-center'>Data Deleted !</h3>";
      exit;
    }
  } else {
    $banner_name = $_POST['banner_name'];
    $link = $_POST['link'];
    $status = $_POST['status'];
    $button = $_POST['button'];
    $file_name = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], "../terket/images/slide/".$file_name);
    if($button == "change") {
      $query = mysqli_query($connection, "UPDATE banner SET banner_name='$banner_name', image='$file_name', link='$link', status='$status' WHERE banner_id='$banner_id'");
      echo "<h3 class='text-success text-center'>Data Changed !</h3>";
    } else if($button == "add") {
      $query = mysqli_query($connection, "INSERT INTO banner VALUES('', '$banner_name', '$file_name', '$link', '$status')");
      echo "<h3 class='text-success text-center'>Data Added !</h3>";
    }
  }

?>