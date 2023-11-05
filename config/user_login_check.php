<?php
  session_start();
  if(!isset($_SESSION['user_email'])){
    echo  "<script>location.href='../login.php';</script>";
  }
?>