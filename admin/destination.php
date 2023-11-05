<?php include('nav.php');  ?>
  <main class="container col-sm-10 my-5">
    <h2 class="text-center my-5">Destination List</h2>
    <table class="table table-striped">
          <thead>
            <tr>
              <th class="d-none d-md-table-cell" scope="col">S.N</th>
              <th scope="col">Package Name</th>
              <th class="d-none d-md-table-cell" scope="col">Duration</th>
              <th class="d-none d-md-table-cell" scope="col">state</th>
              <th scope="col">Image</th>
              <th class="d-none d-md-table-cell" scope="col">Price</th>
              <th class="d-none d-md-table-cell" scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <?php
      $sql = "SELECT * FROM `package_tbl`  " ;

      //execute the query
      $res = mysqli_query($conn,$sql);

      //count rows
      $count = mysqli_num_rows($res);

      //create serial number variable
      $sn=1;

      //check whether we have data in database or not 
           if($count>0)
           {

             //we have data in database 
             //get the data and display

             while($row=mysqli_fetch_assoc($res))
             {
               $id = $row['id'];
               $package_name = $row['package_name'];
             $duration = $row['package_duration'];
            //  $desc = $row['package_desc'];
             $state = $row['state'];
             $price = $row['price'];
             $category = $row['category'];
             $image =  $row['image'];

                 ?>



          <tbody>
            <tr>
              <th class="d-none d-md-table-cell" scope="row">
                <?php echo $sn++ ; ?>
              </th>
              <td>
                <?php echo $package_name; ?>
              </td>
              <!-- <td><?php echo $desc; ?></td> -->
              <td class="d-none d-md-table-cell">
                <?php echo $duration; ?>
              </td>
              <td class="d-none d-md-table-cell">
                <?php echo $state; ?>
              </td>
              <td>
                <?php
                          
                          //check whether the image is available or not\
                           if($image != ""){
                           //display the image
                        ?>
                <img src="http://localhost/travel/img/packages/<?php echo $image; ?>" width="100px">
                <?php
                                       }
                                       else{
                                         //display the msg
                                         echo "<div class='error'> image not available </div>";
                                       }
                                       
                                       
                                       ?>
              </td>
              <td class="d-none d-md-table-cell">
                <?php echo $category; ?>
              </td>
              <td class="d-none d-md-table-cell">
                <?php echo $price; ?>
              </td>
              <td>
                <a href="update_destination.php?id=<?php echo $id;?>"><i class="fa fa-edit p-2"></i></a>
                <a href="delete_destination.php?id=<?php echo $id;?>&image=<?php echo $image; ?>"><i
                    class="fa fa-trash-alt p-2"></i></a>

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
              <td colspan="6">
                <div class="error">Package not found</div>
              </td>
            </tr>

            <?php
            }

  ?>
          </tbody>

        </table>


        <a href="add_destination.php" class="btn btn-primary" >Add</a>
  </main>





<?php include('footer.php');  ?>