<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../home/home.css">
</head>
<?php include_once '../header/header1.php'; ?>
<body><br><br><br><br><br><br><br>

<?php
include ('../connection.php');
$query = "SELECT * FROM postroom";
$data = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($data)){
    $image=$row['images1'];
    $pid=$row['pid'];
    $plocation=$row['plocation'];
    $neighbour=$row['neighbour'];
    $price=$row['rentpermonth'];
    $roomsize=$row['roomsize'];
    $nobedroom=$row['nobedroom'];
    $status=$row['status'];
    
    echo " <div class='container'>

        <div class='column'>

        <div class='card'>
        
            <img src='$image' class='card-image'>

            <h5>$status</h5> <h5 class='postid'>$pid</h5>
             
            

        <!-- <img src='../pstroom/images1/IMG-20230806-WA0003.jpg' class='image'>
        <img src='../pstroom/images1/IMG-20230806-WA0003.jpg' class='image'> -->
        
        
        <h3>Location: $plocation</h3><br>
        <p>Neighbour: $neighbour</p><br>
        <p>Price: $price</p><br>
        <p>Room size: $roomsize</p><br>
        <p>No. of bedroom: $nobedroom</p><br><br>
    
        
          <a href='book.php' class='book'>Book</a>
        </div>
        </div>
</div>";
}
?>


<div id="fot">
 <?php include_once '../footer/footer.html'; ?> 
</div>

</body>
</html>