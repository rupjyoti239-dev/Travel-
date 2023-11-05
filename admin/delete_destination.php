<?php include('nav.php'); 
 if(isset($_GET['id']) AND isset($_GET['image']))
  {
    //
    $id = $_GET['id'];
    $image = $_GET['image'];
 
    
    
     if($image != ""){
 
        //Image is Available. So remove it
        $path = "../img/packages/".$image;
        //REmove the Image
        $remove = unlink($path);
 
        //IF failed to remove image then add an error message and stop the process
        if($remove==false){
          //Set the SEssion Message
          echo "<script>location.href='destination.php';</script>";
          $_SESSION['remove'] = '<div class="aletr alert-danger text-center py-2 px-2">Failed to remove image</div>';
          
          
          //Stop the Process
          die();
        }
     }
 
     //Delete Data from Database
       //SQL Query to Delete Data from Database
       $sql = "delete from `package_tbl` where  `id` = $id ";
 
       //Execute the Query
       $res = mysqli_query($conn, $sql);
 
       //Check whether the data is delete from database or not
       if($res){
 
            //SEt Success MEssage and REdirect
            echo "<script>location.href='destination.php';</script>";
            $_SESSION['remove'] = '<div class="aletr alert-danger text-center py-2 px-2">Successfully deleted</div>';
           
       }
       else{
         
         //SEt Fail MEssage and Redirecs
         echo "<script>location.href='destination.php';</script>";
         $_SESSION['remove'] = '<div class="aletr alert-danger text-center py-2 px-2">failed to deleted</div>';
       }
 
 
 
  }
  else{
    //redirect to car list page
    echo "<script>location.href='manage_destination.php';</script>";
 
  }
 
 ?>
 
      