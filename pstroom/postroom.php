<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Post</title>
</head>
<body>
    <h1> Rooms Post </h1>
    <style>
        .accept, .reject{
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
        .reject{
            background-color: red;
        }
    </style>
</body>
</html>

<?php
$pid = $_GET['pid'];


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include ("../connection.php");
$query = "SELECT * FROM postroom";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);
echo "<script>console.log($total)</script>";

if($total != 0)
{
    ?>
    <table border ="3">
    <tr>
        <th>FullName</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Location</th>
        <th>Neighbour</th>
        <th>Room_size</th>
        <th>Num of room</th>
        <th>Rent/month</th>
        <th>Price</th>
        <th>Amenties</th>
        <th>Fur/un</th>
        <th>Status</th>
        <th>Type</th>
        <th>Description</th>
        <th>Images</th>
        <th>Operation</th>
    </tr>
     

    <?php

    while($result = mysqli_fetch_assoc($data))
    {
        echo "<tr>
        <td>".$result['fullname']."</td>
        <td>".$result['email']."</td>
        <td>".$result['phone']."</td>
        <td>".$result['gender']."</td>
        <td>".$result['plocation']."</td>
        <td>".$result['neighbour']."</td>
        <td>".$result['roomsize']."</td>
        <td>".$result['nobedroom']."</td>
        <td>".$result['rentpermonth']."</td>
        <td>".$result['price']."</td>
        <td>".$result['amenties']."</td>
        <td>".$result['furunfur']."</td>
        <td>".$result['status']."</td>
        <td>".$result['type']."</td>
        <td>".$result['description']."</td>
        <td><img src = '".$result['images1']."' height = '100px' width = '100px'>
        <img src = '".$result['images2']."' height = '100px' width = '100px'></td>

        <td><a href='accept.php'><input type='submit' value='Accept' class='accept' name='accept'></a>
        <a href='reject.php?pid=$result[pid]'><input type='submit' value='Reject' class='reject'></a></td>
        
    </tr>
    ";
    }

}
else{
    echo "No records found";
}
?>
</table>  

 