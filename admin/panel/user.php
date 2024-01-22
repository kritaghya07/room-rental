<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <h1 align = "center"> Users </h1>
    <style>
        .update, .delete{
            background-color: green;
            color: white;
            border: 0;
            outline: none;
            border-radius: 5px;
            height: 23px;
            width: 80px;
            font-weight: bold;
            cursor: pointer;
        }
        .delete{
            background-color: red;
        }
    </style>
</body>
</html>

<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include ("../connection.php");
$query = "SELECT * FROM user";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);
echo "<script>console.log($total)</script>";

if($total != 0)
{
    ?>
    <center>
    <table border ="3" cellspacing="7" width = "80%">
    <tr>
        <th>FullName</th>
        <th>Username</th>
        <th>Address</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone</th>
        <th>Operations</th>
    </tr>
     

    <?php

    while($result = mysqli_fetch_assoc($data))
    {
        echo "<tr>
        <td>".$result['fullname']."</td>
        <td>".$result['username']."</td>
        <td>".$result['address']."</td>
        <td>".$result['email']."</td>
        <td>".$result['password']."</td>
        <td>".$result['phone']."</td>
        <td><a href='update.php?id=$result[uid]'><input type='submit' value='Update' class='update'></a>
        <a href='delete.php?id=$result[uid]'><input type='submit' value='Delete' class='delete'></a></td>
        
    </tr>
    ";
    }

}
else{
    echo "No records found";
}




?>
</table>   
</center>

 