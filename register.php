<?php include('./config/connection.php');  ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tourest -Explore the World </title>
  <!-- FONT AWESOME -->
  <link rel="stylesheet" id="fontawesome-css" href="https://use.fontawesome.com/releases/v5.0.1/css/all.css?ver=4.9.1"
    type="text/css" media="all">
  <!-- FAV ICON -->
  <link rel="shortcut icon" href="./img/favicon.svg" type="image/x-icon">
  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- CUSTOM CSS  -->
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/index.css">
  <link rel="stylesheet" href="./css/login.css">
</head>

<body>
  <div class="form-container register">
   <div class="login-form register-form">
     <h2>Register</h2>
     <hr>
    <form action="" method="POST">
      <div class="mb-3">
          <label for="name" class="form-label">User Name</label>
          <input type="text" class="form-control" name="name" autocomplete="off" >
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" autocomplete="off" >
        </div>
        <div class="mb-3">
          <label for="Password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" >
        </div>
        
        <div class="d-flex align-center">
          <input type="submit" value="Login" name="submit" class=" login-btn">
        </div>
        
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
    <p><a href="index.php">BACK TO HOME</a></p>
  </div>
</div>
 </body>


 <?php  
   if(isset($_POST['submit'])){
  // echo 'clicked'; 

   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];
  
  
  

   $insertquery = " insert into user_tbl (user_name, user_email,  user_password) 
   values( '$name', '$email',  '$password' )  ";
   
   $res = mysqli_query($conn, $insertquery);

   if($res){
    echo  '<div class="aletr alert-success mt-2 text-center py-1">Account successfully created</div>';
    
   }
   else{

   echo '<div class="aletr alert-danger mt-2 text-center py-1">Unable to create account</div>';
   }
}

 ?>

<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
  integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>