<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "customer"; 

  $conn = (mysqli_connect($servername,$username,$password,$dbname));

  if($conn){
    //echo "successfully connected"; 
  }
?>