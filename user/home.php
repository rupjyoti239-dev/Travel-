<?php include('nav.php'); ?>

  <!-- hero start -->
  <main class="hero">
    <video src="../img/bg-video.mp4" autoplay="" loop="" muted=""></video>
    <div class="text">
      <h1>
        <span style="color: #FF9933; font-size: 3rem;">North </span>
        <span style="color: #FFFFFF; font-size: 3rem; ">East</span>
        <span style="color: #138808; font-size: 3rem; ">India</span>
      </h1>
      <h3>WELCOME TO NORTH EAST INDIA</h3>
      <div class="extra">
        <span style="color: #FFFFFF; font-weight: bold;"><i class="fas fa-plane"></i> Flight</span>
        <span style="color: #FFFFFF; font-weight: bold;"><i class="fas fa-bed"></i> Accomodation</span>
        <span style="color: #FFFFFF; font-weight: bold;"><i class="fas fa-utensils"></i> Meal</span>
      </div>
    </div>
    <div class="label">
      <span>Package Available From</span>
      <span>₹2999 - ₹9999</span>
    </div>
  </main>
  <!-- hero end -->


  <!-- popular Destination start-->
  <div class="destination">
    <h2>popular Destinations</h2>
    <section class="destination-container">


  <?php   
  
  //getting the data from database 
  $sql = "SELECT * FROM package_tbl limit 3 ";

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
   
     
     ?>
  </section>
</div>
<!-- popular Destination end -->



  <section class="features">
    <div class="feature-card">
      <img src="../img/guide.jpg" width="100" alt="">
      <h4>Travel Guide</h4>
      <p class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing, aut?</p>
    </div>
    <div class="feature-card">
      <img src="../img/journey.png" width="100" alt="">
      <h4>Comfortable Journy</h4>
      <p class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing, aut?</p>
    </div>
    <div class="feature-card">
      <img src="../img/hote.png" width="100" alt="">
      <h4>Luxuries Hotels</h4>
      <p class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing, aut?</p>
    </div>
  </section>





  <?php include('footer.php'); ?>