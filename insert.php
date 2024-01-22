<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "practice";

//creating connection
$conn = mysqli_connect($servername, $username, $password, $database);
//$db = mysqli_select_db($conn,$database);

//checking connection
if($conn){
  echo "Connection successsfull";
  ?>
  <script>alert('Connection successsfull');
  </script>

  <?php
}else{
    die("Connection failed: ".mysqli_connect_error());
}
//Inserting data into table user.

$sql = "INSERT INTO 'user' (id, name, address, phone)
VALUES (2, 'Ram Thapa', 'Itahari',9819374954)";
$result = new mysqli_query($conn, $sql);

if($result){
    echo "Record Inserted successfully";
}else{
    echo "Error Inserting data into Database: ";
}

?>
