<?php include('nav.php'); 

  if(isset($_GET['id']))
   {
       //echo 'getting';
      $id = $_GET['id'];

      //Delete Data from Database
        //SQL Query to Delete Data from Database
        $sql = "delete from `booking_tbl` where  `id` = $id ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the data is delete from database or not
        if($res){

             //SEt Success MEssage and REdirect
             $_SESSION['delete'] = '<div class="aletr alert-success text-center py-2 px-2">Deleted Successfully </div>';
          echo "<script>location.href='view_booking.php';</script>";
        }

        else{

          
          //SEt Fail MEssage and Redirecs
          $_SESSION['delete'] = '<div class="aletr alert-danger text-center py-2 px-2">Failed to Delete </div>';
          echo "<script>location.href='view_booking.php';</script>";
       }

      



    }
    else{
      //redirect to car list page
      echo "<script>location.href='view_booking1.php';</script>";
 
    }




?>
<?php include('footer.php'); ?>