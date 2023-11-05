<?php include('nav.php');  ?>

  <?php  
         //Check whether the id is set or not
         if(isset($_GET['id']))
         {
                //Get the ID and all other details
               // echo "Getting the Data";
               $id = $_GET['id'];
                //create sql query to get all data
                $sql = "select * from `package_tbl` where `id`=$id";

              $res = mysqli_query($conn, $sql);
              
              $count= mysqli_num_rows($res);

              if($count==1){
                //get all the data
                $row = mysqli_fetch_assoc($res);
                $id=$row['id'];
                $package_name = $row['package_name'];
                $desc = $row['package_desc'];
                $duration = $row['package_duration'];
                $state = $row['state'];
                $current_image = $row['image'];
                $price=$row['price'];
                $category = $row['category'];
                $type = $row['type'];
                
              }
              else{
                //redirect
                $_SESSION['not-found']= '<div class="aletr alert-danger text-center py-2 px-2">package details Not found</div>';
                echo "<script>location.href='destination.php';</script>";
              }
             
         } 
         else{
              //redirect to manage car page
              echo "<script>location.href='destination.php';</script>";
         }
      ?>

    <div class="col-sm-6 my-5 mx-5">
        <h2 class="text-center">Update Package</h2>
        <div class="row">
          <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group mb-2">
              <label for="inputName">Package Name</label>
              <input type="text" name="packagename" id="inputName" class="form-control" value="<?php echo $package_name; ?>" required>
            </div>
            
            <div class="form-group mb-2">
              <label for="des">Description</label>
              <textarea name="desc" id="des" cols="18" class="form-control" required><?php echo $desc; ?></textarea>
            </div>
            <div class="row">
            <div class="form-group mb-2 col-sm-6">
              <label for="inputName">Duration</label>
              <input type="text" name="duration" id="inputName" class="form-control" value="<?php echo $duration; ?>" required>
            </div>
            <div class="form-group mb-2 col-sm-6">
              <label for="inputName">State</label>
              <input type="text" name="state" id="inputName" class="form-control" value="<?php echo $state; ?>" required>
            </div>
            </div>
            <div class="form-group mb-2">
              <label for="inputName">Current Image</label>
              <?php
                          
                          //check whether the image is available or not\
                           if($current_image != ""){
                           //display the image
                        ?>
                        <img src="http://localhost/travel/img/packages/<?php echo $current_image; ?>" width="150px" >
                        <?php
                                       }
                                       else{
                                         //display the msg
                                         echo "<div class='error'> image not available </div>";
                                       }
                                       
                                       
                                       ?>
            </div>
            <div class="row">
           
            <div class="form-group mb-2 col-sm-6">
              <label for="inputName">New Image</label>
              <input type="file" name="image" id="inputName" class="form-control"  required>
            </div>
            <div class="form-group mb-2 col-sm-6">
              <label for="inputName">Price</label>
              <input type="number" name="price" id="inputName" class="form-control" value="<?php echo $price; ?>" required>
            </div>
            </div>
            <div class="row">
            <div class="form-group mb-2 col-sm-6">
              <label for="inputName">Category</label>
              <select name="category" id="cat" class="form-control" value="<?php echo $category; ?>" required>
              <?php  
                    //get the data from database
                     $sql = "SELECT * FROM category_tbl";

                     //execute the query
                     $res= mysqli_query($conn,$sql);

                    //count rows
                     $count = mysqli_num_rows($res);

                    //check whether data is available or not
                    if($count>0)
           {

             //we have data in database 
             //get the data and display

             while($row=mysqli_fetch_assoc($res))
             {
               // $id = $row['user_id'];
               $cat_name = $row['category_name'];
              //  $test_fee = $row['test_fee'];
            ?>
           
              <option value="<?php echo $cat_name; ?>"> <?php echo $cat_name;  ?>  </option> 
             
           
           
            <?php

             }
            }
              ?>
               </select>


            </div>
            <div class="form-group mb-2 col-sm-6">
              <label for="type">Type</label>
              <select name="type" id="type" class="form-control"  required>
              <option value="" disabled selected> package type</option>
                <option value="Family">Family Trip</option>
                <option value="solo">Solo Trip</option>
               <option value="road">Road Trip</option>
                <option value="two days">Two Days</option>
              </select>
            </div>
            </div>

            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="update" value="update" class="btn btn-success">
          </form>
          <?php
                if(isset($_SESSION['upload-failed']))
                {
                  echo $_SESSION['upload-failed'];
                  unset($_SESSION['upload-failed']);
                }
            ?> 

      </div>

      <?php

       
//check whether the submit button is clicked or not
if(isset($_POST['update'])){
  // echo 'clicked';

  $package_name = $_POST['packagename'];
  $desc = $_POST['desc'];
  $duration = $_POST['duration'];
  $state = $_POST['state'];
  $curent_image = $_POST['current_image'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $type = $_POST['type'];

  //2. Updating New Image if selected
                //Check whether the image is selected or not
                if(isset($_FILES['image']['name']))
                {
                    //Get the Image Details
                   $image = $_FILES['image']['name'];
                  
                    //Check whether the image is available or not
                    if($image !="")
                  {
                       //Image Available

                        //A. UPload the New Image
    //get the extension of our image
    $tmp = explode('.', $image);
    $file_extension = end($tmp);
    $image = "package_".rand(000,999).'.'. $file_extension;

    $source_path = $_FILES['image']['tmp_name'];
    $destination_path = "../img/packages/".$image;
    $upload = move_uploaded_file($source_path, $destination_path);
    
    //check whether the image is uploaded or not and if the image is not uploaed then stop the process
    if($upload==false){
      
      echo "<script>location.href='destination.php';</script>";
      $_SESSION['upload-failed'] = '<div class="aletr alert-danger text-center py-2 px-2">Failed to upload image</div>';
      die();
    }
 //B. Remove the Current Image if available
 if($current_image !="")
 {
  $remove_path = "../img/packages/".$current_image;

  $remove = unlink($remove_path);

  //CHeck whether the image is removed or not
    //If failed to remove then display message and stop the processs

    if($remove==false)
    {
        //Failed to remove image
        echo "<script>location.href='update_destination.php';</script>";
        die();//Stop the Process
        $_SESSION['upload-failed'] = '<div class="aletr alert-danger text-center py-2 px-2">Failed to remove image</div>';
        
        
    }
 }


}
else
{
$image = $current_image;
}
}
else
{
$image = $current_image;
}  
  //3. Update the Database
  $sql2 = "UPDATE `package_tbl` SET 
  package_name = '$package_name',
  package_desc = '$desc',
  package_duration = '$duration',
  state = '$state',
  category = '$category',
  type = '$type',
  price = '$price',
  image = '$image'
 
  WHERE `id`=$id
";

        $res2 = mysqli_query($conn, $sql2);

        if($res2){

          $_SESSION['update'] = '<div class="aletr alert-success text-center py-2 px-2">Successfully Updated</div>';
          echo "<script>location.href='destination.php';</script>";
        }
        else{
          $_SESSION['update'] = '<div class="aletr alert-danger text-center py-2 px-2">Failed to update</div>';
          echo "<script>location.href='destination.php';</script>";
        }

       
}      
?>





<?php include('footer.php');  ?>