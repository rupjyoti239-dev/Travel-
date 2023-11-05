<?php include('nav.php');  ?>



<main class="container mt-5 r ">
    <div class="col-sm-6 my-5 mx-5">
      <h2 class="text-center">Add New Package</h2>
      <div class="row">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group mb-2">
            <label for="inputName">Package Name</label>
            <input type="text" name="packagename" id="inputName" class="form-control" required>
          </div>
    
          <div class="form-group mb-2">
            <label for="des">Description</label>
            <textarea name="desc" id="des" cols="18" class="form-control" required></textarea>
          </div>
          <div class="row">
            <div class="form-group mb-2 col-sm-6">
              <label for="inputName">Duration</label>
              <input type="text" name="duration" id="inputName" class="form-control" required>
            </div>
            <div class="form-group mb-2 col-sm-6">
              <label for="inputName">State</label>
              <input type="text" name="state" id="inputName" class="form-control" required>
            </div>
          </div>
          <div class="row">
            <div class="form-group mb-2 col-sm-6">
              <label for="inputName">Image</label>
              <input type="file" name="image" id="inputName" class="form-control" required>
            </div>
            <div class="form-group mb-2 col-sm-6">
              <label for="inputName">Price</label>
              <input type="number" name="price" id="inputName" class="form-control" required>
            </div>
          </div>
          <div class="row">
            <div class="form-group mb-2 col-sm-6">
              <label for="inputName">Category</label>
              <select name="category" id="cat" class="form-control" required>
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
    
                <option value="<?php echo $cat_name; ?>">
                  <?php echo $cat_name;  ?>
                </option>
    
    
    
                <?php
    
                 }
                }
                  ?>
              </select>
    
    
            </div>
            <div class="form-group mb-2 col-sm-6">
              <label for="type">Type</label>
              <select name="type" id="type" class="form-control" required>
                <option value="" disabled selected> package type</option>
                <option value="Family">Family Trip</option>
                <option value="solo">Solo Trip</option>
                <option value="road">Road Trip</option>
                <option value="two days">Two Days</option>
              </select>
            </div>
          </div>
          <input type="submit" name="submit" value="submit" class="btn btn-success">
        </form>
    
        <?php
                    if(isset($_SESSION['upload-failed']))
                    {
                      echo ($_SESSION['upload-failed']);
                      unset($_SESSION['upload-failed']);
                    }
    
                    if(isset($_SESSION['update']))
                    {
                      echo ($_SESSION['update']);
                      unset($_SESSION['update']);
                    }
                ?>
      </div>
    </div>

</main>

 
 <?php include('footer.php');  


 if(isset($_POST['submit'])){
// echo 'clicked';

$package_name = $_POST['packagename'];
$desc = $_POST['desc'];
$duration = $_POST['duration'];
$state = $_POST['state'];
$image = $_FILES['image'];
$price= $_POST['price'];
$cat = $_POST['category'];
$type = $_POST['type'];

if(isset($_FILES['image']['name'])){

//upload the image
$image = $_FILES['image']['name'];

//auto rename our image
//get the extension of our image
$tmp = explode('.', $image);
$file_extension = end($tmp);
$image = "packages_".rand(000,999).'.'. $file_extension;

$source_path = $_FILES['image']['tmp_name'];
$destination_path = "../img/packages/".$image;
$upload = move_uploaded_file($source_path, $destination_path);

//check whether the image is uploaded or not and if the image is not uploaed then stop the process
if($upload==false){

echo "<script>location.href = 'add_destination.php';</script>";

$_SESSION['upload-failed'] = '<div class="aletr alert-danger text-center py-2 px-2">Failed to upload image</div>';
die();
}
}
else{
$image = "";
}

$insertquery = " insert into package_tbl (package_name, package_desc,package_duration, state, image,
price,category,type)
values( ' $package_name', '$desc', ' $duration', '$state', '$image', '$price', '$cat', '$type' ) ";

$res = mysqli_query($conn, $insertquery);

if($res){

$_SESSION['update'] = '<div class="aletr alert-success text-center py-2 px-2">Successfully Added</div>';
echo "
<script>location.href = 'add_destination.php';</script>";
}
else{
$_SESSION['update'] = '<div class="aletr alert-danger text-center py-2 px-2">Failed to add</div>';
echo "
<script>location.href = 'add_destination.php';</script>";
}


}


?>
