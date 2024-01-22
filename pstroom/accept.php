<?php


include ("../connection.php");
$pid = $_GET['pid'];
$query = "SELECT * FROM postroom WHERE pid = '$pid'";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);
echo "<script>console.log($total)</script>";


if($total != 0)
{

$result = mysqli_fetch_assoc($data)
        ?>
        <?php
        echo "<tr>
        <td>".$result['fullname']."</td><br>
        <td>".$result['email']."</td><br>
        <td>".$result['phone']."</td><br>
        <td>".$result['gender']."</td><br>
        <td>".$result['plocation']."</td><br>
        <td>".$result['neighbour']."</td><br>
        <td>".$result['roomsize']."</td><br>
        <td>".$result['nobedroom']."</td><br>
        <td>".$result['rentpermonth']."</td><br>
        <td>".$result['price']."</td><br>
        <td>".$result['amenties']."</td><br>
        <td>".$result['furunfur']."</td><br>
        <td>".$result['status']."</td><br>
        <td>".$result['type']."</td><br>
        <td>".$result['description']."</td><br>
        <td><img src = '".$result['images1']."' height = '100px' width = '100px'>
        <img src = '".$result['images2']."' height = '100px' width = '100px'></td>

        </tr>";
    }



?>