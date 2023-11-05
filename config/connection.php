<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $db = "travel";

  $conn = mysqli_connect($hostname,$username,$password,$db);


if(!$conn){
  
  die("could not connect database...");
 }
//  else{
//   echo "connected";
//  }
?>
