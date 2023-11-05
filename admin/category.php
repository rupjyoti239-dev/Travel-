<?php include('nav.php'); ?>

   <div class="container flex-column flex-md-row d-flex justify-content-center align-item-center">
      <div class="col-sm-5 my-5">
        <h2 class="text-center me-5">Add Category</h2>
        <div class="row">
          <div class="col-sm-8 mx-5">
            <form action="" method="post">
            <div class="form-group mb-2">
              <label for="cat">Category Name</label>
              <input type="text" name="category" id="cat" class="form-control" required>
            </div>
              <input type="submit" name="submit" value="submit" class="btn btn-success">
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
      </div>


       <?php 
        
        if(isset($_POST['submit'])){
          $category_name = $_POST['category'];

          $insertquery = " insert into category_tbl (category_name) 
                         values( '$category_name')   ";

                         $res = mysqli_query($conn, $insertquery);

                         if($res){
                 
                           $_SESSION['update'] = '<div class="aletr alert-success text-center py-2 px-2">Successfully Added</div>';
                           echo "<script>location.href='category.php';</script>";
                         }
                         else{
                           $_SESSION['update'] = '<div class="aletr alert-danger text-center py-2 px-2">Failed to add</div>';
                           echo "<script>location.href='category.php';</script>";
                         }
                                
        }

     ?>



<div class="col-sm-5 my-5">
        <h2 class="text-center">Category List</h2>

        <table class="table table-striped">
               <thead>
                 <tr>
                   <th scope="col">S.N</th>
                   <th scope="col">Category Name</th>
                   <th scope="col">Action</th>
                   
                 </tr>
               </thead>


<?php

$sql = " SELECT * FROM category_tbl ";


$res = mysqli_query($conn,$sql);


$count = mysqli_num_rows($res);


$sn=1;


if($count>0)
{
  

  while($row=mysqli_fetch_assoc($res))
  {
     
    $id = $row['id'];
    $cat_name = $row['category_name'];
   
    ?>


     
  <tbody>
    <tr>
      <th scope="row"><?php echo $sn++; ?></th>
      <td><?php echo $cat_name; ?></td>
      <td>
      <a href="update_category.php?id=<?php echo $id;?>" class="btn btn-success ">Update</a>
      <a href="delete_category.php?id=<?php echo $id;?>" class="btn btn-danger ">DELETE</a>
      </td> 
    </tr>
    <?php
                
              }
            }
            else{
              //do not have the data
              //we will display the msg inside the table
              ?>

                    <tr>
                       <td colspan="2"><div class="error">data not found</div></td>
                    </tr>

              <?php
            }

  ?>
</tbody>

</table>
<?php
                if(isset($_SESSION['remove']))
                {
                  echo $_SESSION['remove'];
                  unset($_SESSION['remove']);
                }
               
                if(isset($_SESSION['update1']))
                {
                  echo $_SESSION['update1'];
                  unset($_SESSION['update1']);
                }
           
            ?> 
 </div>

 </div>

<?php include('footer.php'); ?>