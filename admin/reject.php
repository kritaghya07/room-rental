<?php
include ("../connection.php");
$pid = $_GET['pid'];
$query = "DELETE FROM postroom WHERE pid = '$pid'";  
$data = mysqli_query($conn, $query);

if($data){
    echo "record deleted";
}else{
    echo "record not deleted";
}
?>