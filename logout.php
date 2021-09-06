<?php

  session_start();
  include_once("functions/helper.php");
  unset($_SESSION['user_id']);
  unset($_SESSION['name']);
  $_SESSION = [];
  header("Location: ". BASE_URL);
?>