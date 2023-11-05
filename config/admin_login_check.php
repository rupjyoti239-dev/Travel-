<?php
  session_start();
  if(!isset($_SESSION['admin_email'])){
    echo  "<script>location.href='../admin/index.php';</script>";
  }
?>