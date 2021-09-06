<?php

  include_once("connection.php");
  define("BASE_URL", "http://localhost/terket/");

  $order_status[0] = "Waiting for Payment";
  $order_status[1] = "Proccessing Payment";
  $order_status[2] = "Payment Success";
  $order_status[3] = "Payment Fail";

  function query($query) {
    global $connection;
    $data = mysqli_query($connection, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($data)) {
      $rows[] = $row;
    }
    return $rows;
  }

  function price($price) {
    $string = "Rp, " . number_format($price);
    return $string;
  }
?>