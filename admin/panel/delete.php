<?php
include ("../connection.php");
$id = $_GET['uid'];
$query = "DELETE FROM user WHERE id = '$id'";  
$data = mysqli_query($conn, $query);

if($data){
    echo "<script>alert('record deleted')</script>";
    header("location:user.php");
}else{
    echo "record not deleted";
}
?>