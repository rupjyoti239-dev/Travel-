<?php include('config/connection.php'); ?> 
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
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/index.css">
</head>

<body>

 <!-- navabar start -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand text-white fw-bold" href="#">Tourest</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white fw-medium" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-medium" href="destination.php">Destination</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-medium" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white fw-medium" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navabar end -->

  <!-- popular Destination start-->
  <div class="container row ">
  <div class="col-sm-3">
      <form action="" method="GET">
      <div class="card shadow mt-3">
        <div class="card-header">
          <h5>
            Filter
            <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
          </h5>
        </div>
        <div class="card-body">
          <h6>Brand List</h6>
          <hr>
          <?php

              $sql="SELECT * FROM category_tbl";
              $res = mysqli_query($conn,$sql);

              if(mysqli_num_rows($res)>0)
              {

                foreach($res as $cat){

                  $checked = [];
                  if(isset($_GET['category'])){
                    $checked = $_GET['category'];
                  }

                  // echo $cat['category_name'];
                  ?>

                  <div>
                    <input type="checkbox" name="category[]" value="<?= $cat['category_name'];   ?>" 
                    
                    <?php
                       if(in_array($cat['category_name'],$checked)){
                         echo "checked";
                       }
                    ?>
                    >
                    <?=  $cat['category_name']; ?>
                  </div>

                  <?php
                }

              }else{
                echo "No category found";
              }

          ?>
        </div><!-- card-body-->
      </div> <!--card -->
      </form>
    </div>

  <!-- 1st -->

<!-- polular destinatioin -->
 <div class="destination">
    <h2>popular Destinations</h2>
    <section class="destination-container">


   <?php   
  
  if(isset($_GET['category'])){
     
    $categorychecked = [];
    $categorychecked = $_GET['category'];
    foreach($categorychecked as $rowcategory){
      // echo $rowcategory; 
      $sql = "SELECT * FROM package_tbl WHERE `category` IN ('$rowcategory') ";

  //execute the query
  $res = mysqli_query($conn,$sql);
  
  //count rows
  $count = mysqli_num_rows($res);

  //check whether data is available or not
  if($count>0)
  {
    //data is available

    while($row=mysqli_fetch_assoc($res)){

      //get all the value
      $id = $row['id'];
      $package_name = $row['package_name'];
      $desc = $row['package_desc'];
      $duration = $row['package_duration'];
      $price = $row['price'];
      $image = $row['image'];
     ?>




    <div class="card text-center" style="width: 18rem;">
      <img src="http://localhost/travel/img/packages/<?php echo $image; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $package_name; ?></h5>
        <span style="font-weight: 500; font-size: 14px;"><?php echo $duration; ?></span>
       <p class="fw-bold text-danger"> &#8377; <?php echo $price; ?></p>
       <p class="card-text"><?php echo $desc; ?></p>
        <a href="viewDestination.php?id=<?php echo $id; ?>" class="btn btn-sm btn-primary">Book Now</a>
      </div>
    </div>


    <!-- end -->
   <?php
       }
     }
     else{
       //Food Not Available 
       echo "<div class='error'>Package not  available.</div>";
     } 
    }
     
     ?>



<?php
      
   
    }else{

  //getting the data from database 
  $sql = "SELECT * FROM package_tbl ";

  //execute the query
  $res = mysqli_query($conn,$sql);
  
  //count rows
  $count = mysqli_num_rows($res);

  //check whether data is available or not
  if($count>0)
  {
    //data is available

    while($row=mysqli_fetch_assoc($res)){

      //get all the value
      $id = $row['id'];
      $package_name = $row['package_name'];
      $desc = $row['package_desc'];
      $duration = $row['package_duration'];
      $price = $row['price'];
      $image = $row['image'];
     ?>

     <div class="card text-center" style="width: 18rem;">
      <img src="http://localhost/travel/img/packages/<?php echo $image; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $package_name; ?></h5>
        <span style="font-weight: 500; font-size: 14px;"><?php echo $duration; ?></span>
       <p class="fw-bold text-danger"> &#8377; <?php echo $price; ?></p>
       <p class="card-text"><?php echo $desc; ?></p>
        <a href="viewDestination.php?id=<?php echo $id; ?>" class="btn btn-sm btn-primary">Book Now</a>
      </div>
    </div>

<?php
       }
     }
     else{
       //Food Not Available 
       echo "<div class='error'>Package not  available.</div>";
     } 
   
    }
     ?>







  </section>
</div>
</div>
<!-- popular Destination end -->




  <footer>
    <div class="footer-card">
      <span>Contact Us:</span>
      <span>📞 80030050</span>
    </div>
    <div class="footer-card">
      <span>Developed & Design By Rupjyoti</span>
      <span>©2023, All rights reserved</span>
    </div>
    <div class="footer-card">
      <span>Follw Us:</span>
      <span>
        <i class="fab fa-facebook mx-2"></i>
        <i class="fab fa-twitter mx-2"></i>
        <i class="fab fa-instagram mx-2"></i>
      </span>
    </div>
  </footer>



   <!-- script -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>

</html>