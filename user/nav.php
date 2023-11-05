<?php
 include('../config/connection.php'); 
 include('../config/user_login_check.php');
 $user_email = $_SESSION['user_email'];
?>

<!doctype html>
<html lang="en">

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
  <link rel="stylesheet" href="../css/viewDestination.css">
</head>

<body>

  <!-- navabar start -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand text-white fw-bold" href="home.php">Tourest</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white fw-medium" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-medium" href="destination.php">Destination</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-medium" href="#">Contact</a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <?php echo $user_email; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="user_profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="booking_details.php">Booking History</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../user/logout.php">Logout</a></li>
          </ul>
        </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navabar end -->