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
  <link rel="stylesheet" href="./css/viewDestination.css">
  <script src="./js/index.js" defer></script>
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


  <?php 


if(isset($_GET['id']))
{
  //  echo 'getting';
    $id = $_GET['id'];

  //get the data from database
 $sql = "SELECT * FROM `package_tbl`  WHERE `id`=$id";

 //execute the query
 $res= mysqli_query($conn,$sql);

  //count rows
  $count = mysqli_num_rows($res);

  //check whether data is available or not
  if($count==1)
   {
     
        //get all data
       $row = mysqli_fetch_assoc($res);
        $package_name = $row['package_name'];
        $desc = $row['package_desc'];
        $duration = $row['package_duration'];
        $state = $row['state'];
        $image = $row['image'];
        $price = $row['price'];
        
       
      
  }
else{
  //redirect
  echo "<script>location.href='destination.php';</script>";
}

}

else{
  //redirect
  echo "<script>location.href='destination.php';</script>";
}

?>




   <section class="destination-card">
    <div class="des-card">
      <img src="http://localhost/travel/img/packages/<?php echo $image; ?>" alt="">
      <div class="text">
        <h2><?php echo $package_name; ?></h2>
        <p class="days"><?php echo $duration; ?></p>
        <p class="price">&#8377; <?php echo $price; ?>/Person</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo fuga animi deleniti non, ad doloribus
          consectetur,
          dolorum neque ipsam ea labore laborum fugit eaque! Perspiciatis a repudiandae, amet natus quod numquam nulla
          aut dolor
          itaque iusto quas commodi sint quis ullam, libero quisquam. Nobis officiis veritatis id atque sequi!
          Obcaecati, nam
          exercitationem! Ducimus accusantium doloribus, saepe error odit quisquam nisi, praesentium possimus quae
          tempora,
        </p>
      </div>

    </div>
  </section>

  <section class="booking-form">
    <img src="./img/booking-image.jpg" alt="">
    <form action="">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
      </div>
      <div class="row">
        <div class="mb-3 col-sm-6">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3 col-sm-6">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
      </div>
      <div class="row">
        <div class="mb-3 col-sm-6">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3 col-sm-6">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
      </div>
      <div>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Book Now
        </button>
      </div>


    </form>
  </section>


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




  <!--js model -->
  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Authentication required</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Please login first to book any package.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="./login.php" class="btn btn-primary">Login</a>
        </div>
      </div>
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