<?php include('nav.php');  ?>
   <?php 
        
        //Check whether the id is set or not
        if(isset($_GET['id']))
        {
               //Get the ID and all other details
              // echo "Getting the Data";
              $id = $_GET['id'];
               //create sql query to get all data
               $sql = "select * from `booking_tbl` where `id`=$id";

             $res = mysqli_query($conn, $sql);
             
             $count= mysqli_num_rows($res);

             if($count==1){
               //get all the data
               $row = mysqli_fetch_assoc($res);
               $id=$row['id'];
               $package_name = $row['package_name'];
              
               $user_name = $row['user_name'];
               $user_contact = $row['user_contact'];
               $user_address = $row['city'];
               $person = $row['person'];
               $amount = $row['total'];
               $booking_date = $row['date'];
               
             }
             else{
               //redirect
               $_SESSION['not-found']= '<div class="aletr alert-danger text-center py-2 px-2">Booking details Not found</div>';
               echo "<script>location.href='booking_list.php';</script>";
             }
            
        } 
        else{
             //redirect to manage car page
             echo "<script>location.href='booking_list.php';</script>";
        }

?> 

   <div class="container">
     <div class="col-sm-6 my-5 mx-5">
        <h2 class="text-center">Update Package</h2>
        <div class="row">
          <form action="" method="post">
              
             <div class="form-group mb-2 col-sm-6">
               <label for="p_name">Package Name</label>
               <input type="text" name="packagename" id="p_name" value="<?php echo $package_name;  ?>" class="form-control" readonly>
             </div>

             <div class="form-group mb-2 col-sm-6">
               <label for="name">User Name</label>
               <input type="text" name="username" id="name" value="<?php echo $user_name;  ?>" class="form-control" readonly>
             </div>

             <div class="form-group mb-2 col-sm-6">
               <label for="p_name">User Contact</label>
               <input type="text" name="packagename" id="p_name" value="<?php echo $user_contact;  ?>" class="form-control" readonly>
             </div>

             <div class="form-group mb-2 col-sm-6">
               <label for="p_name">User Address</label>
               <input type="text" name="packagename" id="p_name" value="<?php echo $user_address;  ?>" class="form-control" readonly>
             </div>

             <div class="form-group mb-2 col-sm-6">
               <label for="duration">Booking Date</label>
               <input type="text" name="duration" id="duration" value="<?php echo $booking_date;  ?>" class="form-control" readonly>
             </div>

             
             <div class="form-group mb-2 col-sm-6">
               <label for="duration">No of Persons</label>
               <input type="text" name="duration" id="duration" value="<?php echo $person;  ?>" class="form-control" readonly>
             </div>
             <div class="form-group mb-2 col-sm-6">
               <label for="status">Status</label>
               <select name="status" id="status" class="form-control"  required>
              
                <option value="cancelled">Cancelled</option>
                <option value="accepted">Accepted</option>
               
              </select>
             </div>
             <input type="hidden" name="id" value="<?php echo $id; ?>">
             <button type="submit" class="btn btn-primary my-2 " name="submit">Update</button>

          </form>
        </div>
      </div>  
   </div>





   <?php
       
       if(isset($_POST['submit']))
       {
          
          $status = $_POST['status'];


          //. Update the Database
          $sql2 = "UPDATE `booking_tbl` SET 
          
          status = '$status'
         
          WHERE `id`=$id
      ";

        //Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //4. REdirect to Manage Category with MEssage
                //CHeck whether executed or not
                if($res2==true)
                {
                   $_SESSION['not-found']= '<div class="aletr alert-success text-center py-2 px-2">Successfully Updated</div>';
                   echo "<script>location.href='view_booking.php';</script>";
                }
                else{

                  $_SESSION['not-found']= '<div class="aletr alert-danger text-center py-2 px-2">Failed Updated</div>';
                  echo "<script>location.href='view_booking.php';</script>";
                }

       }
 ?>


<?php include('footer.php');  ?>