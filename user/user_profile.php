<?php include('nav.php'); ?>


  <?php //sql
          $sql = "select * from `user_tbl` where `user_email`='$user_email'";

          $res = mysqli_query($conn, $sql);

          $count= mysqli_num_rows($res);

          if($count==1){
          //get all the data
          $row = mysqli_fetch_assoc($res);
          $user_name=$row['user_name'];
          // $user_password=$row['user_password'];


}
?>

<div class="container">
  <div class="col-sm-6 px-5 my-5">
        <h1 class="text-center">Profile</h1>
         <!-- user information -->
         <form action="" method="POST" >
            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input type="email" name="useremail" id="inputEmail" class="form-control" value="<?php echo $user_email; ?>"  readonly>
            </div>
            <div class="form-group">
              <label for="inputName">Name</label>
              <input type="text" name="username" id="inputName" class="form-control" value="<?php echo $user_name; ?>">
            </div>
            <!-- <div class="form-group">
              <label for="inputName">Name</label>
              <input type="text" name="userpassword" id="inputName" class="form-control" value="<?php echo $user_password; ?>">
            </div> -->

            <button type="submit" class="btn btn-danger my-2 " name="update">Update</button>

            <?php
                if(isset($_SESSION['update']))
                {
                  echo $_SESSION['update'];
                  unset($_SESSION['update']);
                }
            ?>
          </form>

      </div>
</div>



<?php
            if(isset($_POST['update']))
            {
                //  echo "<script>location.href='user_profile.php';</script>";
                //  $_SESSION['update'] = '<div class="text-success text-center py-2 px-2">Profile Updated Successfully.</div>';

               //1. Get all the values from our form
              
               $user_name = $_POST['username'];
              
              
    
                 //3. Update the Database
                 $sql2 = "UPDATE `user_tbl` SET 
                 user_name = '$user_name' 
                 
                 
                 WHERE `user_email`='$user_email'
             ";

             //Execute the Query
             $res2 = mysqli_query($conn, $sql2);

             if($res2==true)
            {
               //profile details Updated
               echo "<script>location.href='user_profile.php';</script>";
               $_SESSION['update'] = '<div class="aletr alert-success text-center py-2 px-2">Profile Updated Successfully.</div>';
            }
            else{

              echo "<script>location.href='user_profile.php';</script>";
              $_SESSION['update'] = '<div class="aletr alert-danger text-center py-2 px-2">Failed to update</div>';
            }


            }

       ?>


<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<?php include('footer.php'); ?>
