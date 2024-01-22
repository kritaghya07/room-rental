<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

//creating connection
$conn = mysqli_connect($servername, $username, $password, $database);
//$db = mysqli_select_db($conn,$database);

//checking connection
if($conn){
  echo "<script>console.log('connection success'); </script>";

}else{
    die("Connection failed: ".mysqli_connect_error());
}
?>
