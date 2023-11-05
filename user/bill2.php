<?php include('../config/connection.php'); 
 include('../config/user_login_check.php');
 $user_email = $_SESSION['user_email']; ?>



<?php
if(isset($_GET['id'])){ 
  $id = $_GET['id'];

$sql = "SELECT * FROM booking_tbl  WHERE id = $id ";
  $res= mysqli_query($conn,$sql);
  $count = mysqli_num_rows($res);
  if($count==1)
   {
     
        //get all data
       $row = mysqli_fetch_assoc($res);
        $package_name = $row['package_name'];
        $duration = $row['duration'];
        $person= $row['person'];
        $user_name = $row['user_name'];
        $user_contact = $row['user_contact'];
        $booking_date = $row['date'];
        $total = $row['total'];
        $bill = $row['bill_no'];
       

  }
else{
  //redirect
  echo "<script>location.href='user_profile.php';</script>";
}
}else{
  //redirect to manage car page
  echo "<script>location.href='view_booking.php';</script>";
}


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
   <style>
    body{
      height: 100vh;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>
</head>

<body>

<div class="col-sm-4  px-5   Bill" >

<h2 class="text-center mb-2">Bill</h2>

<div class='ml-5 '>
   <table class="table border">
   <tbody>
      
      <tr>
        <td>Bill no:</td>
        <td><span class="fw-bold"><?php echo $bill; ?></span></td>
      </tr>
      <tr>
        <td>package Name:</td>
        <td><span class="fw-bold"><?php echo $package_name; ?></span></td>
      </tr>
      <tr>
        <td>Duration:</td>
        <td><span class="fw-bold"><?php echo $duration; ?></span></td>
      </tr>
      <tr>
        <td>No of Persons:</td>
        <td><span class="fw-bold"><?php echo $person; ?></span></td>
      </tr>
      <tr>
        <td>Customer Name:</td>
        <td><span class="fw-bold"><?php echo $user_name; ?></span></td>
      </tr>
      <tr>
        <td>Customer Contact:</td>
        <td><span class="fw-bold"><?php echo $user_contact; ?></span></td>
      </tr>
      <tr>
        <td>Booking Date:</td>
        <td><span class="fw-bold"><?php echo $booking_date; ?></span></td>
      </tr>
      
      <tr>
        <td>Total Bill:</td>
        <td><span class="fw-bold"><?php echo $total; ?></span></td>
      </tr>
      <tr>
          <!-- <td> <form-class='d-print-none'><input class='btn btn-danger' type='submit' value='print' onClick='window.print()'></form></td> -->
      </tr>
   </tbody>
   </table>
   <button class="btn btn-danger" onClick='window.print()'>Print</button>
   <a href="home.php" class="btn btn-secondary ms-3">Close</a>
   
 </div> 
 </div> 
 <!-- script -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>

</html>


