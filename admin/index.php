<?php include('../config/connection.php');  ?>
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
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/login.css">
</head>

<body>
           
  <div class="form-container">
   <div class="login-form">
     <h2>Admin Login</h2>
     <hr>
    <form action="" method="post">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" autocomplete="off" >
        </div>
        <div class="mb-3">
          <label for="Password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="Password" >
        </div>
        <div class="d-flex align-center">
          <input type="submit" value="Login" name="submit" class=" login-btn">
        </div>
        
    </form>
    
  </div>
</div>
 </body>

<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
  integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>

<?php 

  if(isset($_POST['submit']))
  {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_tbl WHERE admin_email ='$email' AND admin_password='$password'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if($count==1){
      session_start();
      $_SESSION['admin_email'] = $email;
      echo "<script>
      location.href='admin_dashboard.php';
      alert('Login Successful');
      </script>";
    }
    else{
      echo  "<script>alert('Login Failed');</script>";
    }
  }
  


?>