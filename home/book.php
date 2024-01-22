<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Room</title>
</head>
<body>
    <h3>To book a room you need to submit some details.</h3>
    <form method="POST" action="#" enctype="multipart/form-data" >
        <label for="name">Name:</label><br>
        <input type="text" name = "name" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="text" name = "email" required><br><br>
        
        <label for="phone">Phone</label><br>
        <input type="text" name = "phone" required><br><br>

        <label for="image">ID</label><br>
        <input type="file" id="img" name = "upload" accept=".jpg, .jpeg, .png"><br><br>

        <?php

        if(isset($_POST['submit'])){

                $filename1 = $_FILES['upload']['name'];
                $tempname1 = $_FILES['upload']['tmp_name'];
                $folder = "images/".$filename1;
                $result1 = move_uploaded_file($tempname1, $folder);
                echo "<script>console.log($result1);</script>";
                if($result1){
                echo "<script>console.log('sucessfull Image Uploaded');</script>";
                }else{
                    echo "<script>console.log('failed to upload image');</script>";
                }
            }

            ?>

        

            <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>

<?php

            if(isset($_POST['submit'])){

                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
            
                include_once '../connection.php';

                $query = "INSERT INTO book(name, email, phone, image) VALUES ('$name', '$email', '$phone', '$folder')";
                $result = mysqli_query($conn, $query);
    

                echo "<script>console.log($result);</script>";
    


    if ($result) {

    echo "<script>alert('Data inserted successfull');</script>";
  

    }else {
    //echo "<script>alert('failed to insert data');</script>";
    }

}




?>