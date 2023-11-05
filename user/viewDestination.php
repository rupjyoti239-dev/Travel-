<?php include('nav.php'); ?>



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
    <img src="../img/booking-image.jpg" alt="">
    <form action="" method="post" onsubmit="return myFun()">
     <div class="form-group mb-2">
              <label for="name">Name</label>
              <input type="text" name="username" id="name" class="form-control" required>
            </div>

     <div class="form-group mb-2">
              <label for="email">Email</label>
              <input type="email" name="useremail" value="<?php echo $user_email; ?>" id="name" class="form-control" readonly>
            </div>

      <div class="row">
        <div class="mb-3 col-sm-6">
          <label for="contact">Contact</label>
              <input type="tel" name="usercontact" id="contactxd" class="form-control" required> <span class="text-danger text-center  py-1 px-2" id="messages"> </span>
        </div>
        <div class="mb-3 col-sm-6">
         <label for="city">City</label>
              <input type="text" name="usercity" id="city" class="form-control" required>
        </div>
      </div>
      <div class="row">
        <div class="mb-3 col-sm-6">
          <label for="person">No of Person</label>
              <input type="number" name="person" id="person" class="form-control" min="1" required>
        </div>
        <div class="mb-3 col-sm-6">
          <label for="demo">Date</label>
              <input type="date" name="date" id="demo" class="form-control" required>
        </div>
      </div>
      <div>

       <input type="text" value="<?php echo $package_name; ?>" name="package_name" hidden>
            <input type="text" value="<?php echo $duration; ?>" name="duration" hidden>
            <input type="text" value="pending" name="status" hidden>

       <input type="submit" class="btn btn-success mt-3" name="submit" value="Book Now" >
      </div>


    </form>
  </section>
     <?php
                if(isset($_SESSION['booking']))
                {
                  echo $_SESSION['booking'];
                  unset($_SESSION['booking']);
                }
            ?>



   <script>
              function myFun(){
                var a  = document.getElementById("contactxd").value;
                if(isNaN(a)){
                  document.getElementById("messages").innerHTML="** Enter a vaild number";
                  return false;
                }
                if(a.length<10){
                  document.getElementById("messages").innerHTML="** Mobile number must be 10 digits";
                  return false;
                }
                if(a.length>10){
                  document.getElementById("messages").innerHTML="** Mobile number must be 10 digits";
                  return false;
                }
                if((a.charAt(0) != 9) && (a.charAt(0) != 8) && (a.charAt(0) != 7) && (a.charAt(0) != 6)) {
                  document.getElementById("messages").innerHTML="** Enter a vaild number";
                  return false;
                }
              }
            </script>
            <!-- dissable past date -->
<script>
                        var todayDate = new Date();
                        var month = todayDate.getMonth() +1 ; 
                        var year = todayDate.getUTCFullYear() - 0; 
                        var tdate = todayDate.getDate(); 
                           if(month < 10){
                                month = "0" + month 
                              }
                           if(tdate < 10){
                               tdate = "0" + tdate;
                              }
                        var maxDate = year + "-" + month + "-" + tdate;
                        document.getElementById("demo").setAttribute("min", maxDate);
                        console.log(maxDate);
                      </script>

                    <!-- dissable future date  -->
                    <script>
                        var todayDate = new Date();
                        var month = todayDate.getMonth() +2 ; 
                        var year = todayDate.getUTCFullYear() - 0; 
                        var tdate = todayDate.getDate(); 
                           if(month < 10){
                                month = "0" + month 
                              }
                           if(tdate < 10){
                               tdate = "0" + tdate;
                              }
                        var maxDate = year + "-" + month + "-" + tdate;
                        document.getElementById("demo").setAttribute("max", maxDate);
                        console.log(maxDate);
                      </script>

<?php include('footer.php'); ?>
<?php 

    //check whether submit button is clicked or not
    if(isset($_POST['submit'])){

     // echo "click";
    //get all the details from the form
    $bill_no = mt_rand(100000000, 999999999);
    $package_name = $_POST['package_name'];
    $duration = $_POST['duration'];             
    $user_name = $_POST['username'];
    $user_email = $user_email;
    $user_contact = $_POST['usercontact'];
    $person = $_POST['person'];
    $total = $price * $person;
    $user_address = $_POST['usercity'];
    $date = $_POST['date'];
    $status = $_POST['status'];

   // save the order in database 
    $sql = "insert into booking_tbl (bill_no,package_name, duration,  user_name, user_email, user_contact, city, person , date,  status, total ) 
    values( '$bill_no','$package_name', '$duration',  '$user_name', '$user_email', '$user_contact',  '$user_address',  ' $person', '$date','$status', ' $total') 
            ";
     // execute the query
      $res = mysqli_query($conn,$sql);

      if($res == true)
      {
        echo "<script>location.href='bill.php';</script>";
        $generateid = mysqli_insert_id($conn);
        $_SESSION['myid'] = $generateid;
        $_SESSION['booking'] = '<div class="aletr alert-success text-center my-3 py-2 px-2">Successfully booked.</div>';
      }else{
        echo "<script>location.href='package_enquery.php';</script>";
        $_SESSION['booking'] = '<div class="aletr alert-danger text-center my-3 py-2 px-2">Booking failed.</div>';
      }
    }
?>

