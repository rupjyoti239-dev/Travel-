<?php include('nav.php'); ?>
  
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

<?php include('footer.php'); ?>