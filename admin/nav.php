<?php
 include('../config/connection.php'); 
 include('../config/admin_login_check.php');
 $admin_email = $_SESSION['admin_email'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tourest -Explore the World </title>
  <!-- FONT AWESOME -->
  <link rel="stylesheet" id="fontawesome-css" href="https://use.fontawesome.com/releases/v5.0.1/css/all.css?ver=4.9.1"
    type="text/css" media="all">
  <!-- FAV ICON -->
  <link rel="shortcut icon" href="./img/favicon.svg" type="image/x-icon">
  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- CUSTOM CSS  -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>


  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid text-white">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Travel</span>
    </div>
  </nav>



  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="./admin_dashboard.php">DashBoard</a>
    <a href="./destination.php">Destinations</a>
    <a href="./category.php">Category</a>
    <a href="./view_booking.php">Booking</a>
    <a href="./logout.php">Logout</a>
  </div>