<?php include('nav.php');  ?>
 <div class="container col-sm-10 my-5">
      
       <h2 class="text-center my-5">Booking List</h2>

       <table class="table table-striped">
  <thead>
    <tr>
      <th class="d-none d-md-table-cell" scope="col">S.N</th>
      <th scope="col">User Name</th>
      <th class="d-none d-md-table-cell" scope="col">User Contact</th>
      <th class="d-none d-md-table-cell" scope="col">User Address</th>
      <th class="d-none d-md-table-cell" scope="col">No of Persons</th>
      <th  class="d-none d-md-table-cell"scope="col">Package Name</th>
      <th scope="col">Amount</th>
      <th class="d-none d-md-table-cell" scope="col">Booking Date</th>
      <th  scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <?php
      $sql = "SELECT * FROM `Booking_tbl`  " ;

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
               $name = $row['user_name'];
            //  $desc = $row['package_desc'];
             $contact = $row['user_contact'];
             $address = $row['city'];
             $person = $row['person'];
             $date = $row['date'];
             $status =  $row['status'];
             $total =  $row['total'];

                 ?>



<tbody>
    <tr>
      <th class="d-none d-md-table-cell"  scope="row"><?php echo $sn++ ; ?></th>
      <td><?php echo $name; ?></td>
      <td class="d-none d-md-table-cell"><?php echo $contact; ?></td>
      <td class="d-none d-md-table-cell"><?php echo $address; ?></td>
      <td class="d-none d-md-table-cell"><?php echo $person; ?></td>
      <td class="d-none d-md-table-cell"><?php echo $package_name; ?></td>
      <td><?php echo $total; ?></td>
      <td class="d-none d-md-table-cell"><?php echo $date; ?></td>
      <td><?php echo $status; ?></td>
      <td>
            <a href="update_booking.php?id=<?php echo $id;?>"><i class="fa fa-edit p-2"></i></a>
            <a href="delete_booking.php?id=<?php echo $id;?>"><i class="fa fa-trash-alt p-2"></i></a>

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
                       <td colspan="6"><div class="error">Booking details not found</div></td>
                    </tr>

              <?php
            }

  ?>
  </tbody>

</table>
<a href="booking_Report.php" class="btn btn-primary" >View Report</a>


<?php
                if(isset($_SESSION['delete']))
                {
                  echo $_SESSION['delete'];
                  unset($_SESSION['delete']);
                }
                if(isset($_SESSION['not-found']))
                {
                  echo $_SESSION['not-found'];
                  unset($_SESSION['not-found']);
                }
            ?>

      </div>



<?php include('footer.php');  ?>