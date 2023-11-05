<?php include('nav.php');  ?>


   <?php
          //Check whether the id is set or not
          if(isset($_GET['id']))
          {
                 //Get the ID and all other details
                // echo "Getting the Data";
                $id = $_GET['id'];

      $sql = "SELECT * FROM `category_tbl` WHERE `id` = '$id' ";
      $res = mysqli_query($conn, $sql);
                 
      $count= mysqli_num_rows($res);

      if($count==1){
        //get all the data
        $row = mysqli_fetch_assoc($res);
        $cat_name = $row['category_name'];
      }
      else{
        //redirect
        $_SESSION['not-found']= '<div class="aletr alert-danger text-center py-2 px-2">category details Not found</div>';
        echo "<script>location.href='category.php';</script>";
      }
     
 } 
 else{
      //redirect to manage car page
      echo "<script>location.href='category.php';</script>";
 }

?>        




     <div class="container col-sm-5 my-5">
        <h2 class="text-center me-5">Update Category</h2>
        <div class="row">
          <div class="col-sm-8 mx-5">
            <form action="" method="post">
            <div class="form-group mb-2">
              <label for="cat">Category Name</label>
              <input type="text" name="category" id="cat" class="form-control" value="<?php echo $cat_name;  ?>" required>
            </div>
              <input type="submit" name="update" value="submit" class="btn btn-success">
             
            </form>
          </div>
        </div>
      </div>



      <?php
            if(isset($_POST['update']))
            {
                //  echo "<script>location.href='user_profile.php';</script>";
                //  $_SESSION['update'] = '<div class="text-success text-center py-2 px-2">Profile Updated Successfully.</div>';

               //1. Get all the values from our form
              
               $cat_name = $_POST['category'];
              
              
    
                 //3. Update the Database
                 $sql2 = "UPDATE `category_tbl` SET 
                 category_name = '$cat_name' 
                 
                 
                 WHERE `id`='$id'
             ";

             //Execute the Query
             $res2 = mysqli_query($conn, $sql2);

             if($res2==true)
            {
               //profile details Updated
               echo "<script>location.href='category.php';</script>";
               $_SESSION['update1'] = '<div class="aletr alert-success text-center py-2 px-2">category Updated Successfully.</div>';
            }
            else{

              echo "<script>location.href='category.php';</script>";
              $_SESSION['update1'] = '<div class="aletr alert-danger text-center py-2 px-2">Failed to update</div>';
            }


            }

       ?>

<?php include('footer.php');  ?>