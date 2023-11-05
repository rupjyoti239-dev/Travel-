<?php include('nav.php'); ?>
<div class="container col-sm-10 p-5">
  <h2 class="text-center mb-5">Booking Status</h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th class="d-none d-md-table-cell" scope="col">S.N</th>
      <th scope="col">Package Name</th>
      <th class="d-none d-md-table-cell" scope="col">Duration</th>
      <th class="d-none d-md-table-cell" scope="col">No. of Person</th>
      <th scope="col">Booking Date</th>
      <th scope="col">Total</th>
      <th scope="col">Status</th>
      <th scope="col">Bill</th>
    </tr>
  </thead>

  <?php
      $sql = "SELECT * FROM `booking_tbl`  WHERE `user_email`='$user_email' ORDER BY `id` DESC" ;

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
             $duration = $row['duration'];
             $person = $row['person'];
             $booking_date = $row['date'];
             $total = $row['total'];
             $status = $row['status'];

                 ?>






<tbody>
    <tr>
      <th class="d-none d-md-table-cell" scope="row"><?php echo $sn++ ; ?></th>
      <td><?php echo $package_name; ?></td>
      <td class="d-none d-md-table-cell"><?php echo $duration; ?></td>
      <td class="d-none d-md-table-cell"><?php echo $person; ?></td>
      <td><?php echo $booking_date; ?></td>
      <td><?php echo $total; ?></td>
      <td><?php echo $status; ?></td>
      <td>
      <a href="bill2.php?id=<?php echo $id;?>"><i class="fa fa-file-pdf  fa-2x"></i></a>
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
                       <td colspan="6"><div class="error">Details not found</div></td>
                    </tr>

              <?php
            }

  ?>
  </tbody>
</table>
</div>

<br><br><br><br><br>
<br><br><br><br><br>
<br><br><br><br><br>

<?php include('footer.php'); ?>