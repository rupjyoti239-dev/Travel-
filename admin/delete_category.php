<?php include('../config/admin_login_check.php');
      include('../config/connection.php');
      $email = $_SESSION['admin_email'];  ?>


<?php

//check whether the id and image name is set or not
if(isset($_GET['id']))
{
  //
  $id = $_GET['id'];
  

  
  
  
  
     //SQL Query to Delete Data from Database
     $sql = "delete from `category_tbl` where  `id` = $id ";

     //Execute the Query
     $res = mysqli_query($conn, $sql);

     //Check whether the data is delete from database or not
     if($res){

          //SEt Success MEssage and REdirect
          echo "<script>location.href='category.php';</script>";
          $_SESSION['remove'] = '<div class="aletr alert-danger text-center py-2 px-2">Successfully deleted</div>';
         
     }
     else{
       
       //SEt Fail MEssage and Redirecs
       echo "<script>location.href='category.php';</script>";
       $_SESSION['remove'] = '<div class="aletr alert-danger text-center py-2 px-2">failed to deleted</div>';
     }



}
else{
  //redirect to car list page
  echo "<script>location.href='category.php';</script>";

}

?>


