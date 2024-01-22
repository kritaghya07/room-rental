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
    <title>Post Your Room</title>
    <link rel="stylesheet" type="text/css" href="proom.css">
</head>
<body>
<?php include ('../header/header1.php'); ?>

    

<h1>To post you Room you need to fill Property details below.</h1><br>
<h2></h2><br>
<div class="whole">
    <h1>Property detail form</h1>
    <form action="proom.php" method="POST" enctype="multipart/form-data">
        <div class="fname">
        <label for="fullname">Full Name:</label><br>
            <input type="text" id="fullName" name="fname" placeholder="Enter Full Name"></div>
        
            <div class="email">
            <label for="email">Email:</label><br>
            <input type="text" id="emai" name="email" placeholder="Enter Email"></div>
            
            <div class="left">
            <label for="phone">Phone:</label><br>
            <input type="text" id="phone" name="phone" placeholder="Enter Phone No."></div>
        
            <div class="right">
            <label for="gender">Gender:</label><br>
            <select name="gender" id="rclass">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="other">Other</option>
            </select></div>

            <div class="left">
            <label for="location">Enter your property location:</label><br>
            <input type="text" id="lclass" name="location" placeholder="full address city,street"></div>

            <div class="right">
            <label for="neighbour">Neighbourhood/Landmark:</label><br>
            <input type="text" id="rclass" name="neighbour" placeholder="Eg.office name, educational institute.etc"></div>

            <div class="left">
            <label for="rsize">Enter room size:</label><br>
            <input type="text" id="lclass" name="rsize" placeholder="Enter size of room in feet.eg: 20*50ft"></div>

            <div class="right">
            <label for="rent">Total number of bedroom:</label><br>
            <select name="nbedroom" id="rclass">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="5+">5+</option>
            </select></div>

            <div class="left">
            <label for="rpmonth">Rent per month (Rs):</label><br>
            <input type="text" id="lclass" name="rpmonth" placeholder="Rent price in Rs"></div>

            <div class="right">
            <label for="price">Price:</label><br>
            <select name="price" id="rclass">
            <option value="choose one">choose one</option>
            <option value="Fixed">Fixed</option>
            <option value="Negotiable">Negotiable</option>
            </select></div>

            <div class="left">
            <label for="">Property Amenties:</label><br>
            <input type="checkbox" id="check" name="amenties[]" value="Wifi">
            <label for="amenties">Wifi</label>
            <input type="checkbox" id="check" name="amenties[]" value="24hr water">
            <label for="amenties">24hr water</label>
            <input type="checkbox" id="check" name="amenties[]" value="parking">
            <label for="amenties">parking</label>
            <input type="checkbox" id="check" name="amenties[]" value="waste management">
            <label for="amenties">Waste Management</label></div>

            <div class="rights">
            <label for="funun">Furnished/Unfurnished:</label><br>
            <select name="furunfur" id="rclass">
            <option value="choose">choose one</option>
            <option value="Furnished">Furnished</option>
            <option value="Unfurnished">Unfurnished</option>
            </select></div>

            <div class="left">
            <label for="status">Property Status:</label><br>
            <select name="status" id="lclass">
            <option value="choose one">choose one</option>
            <option value="Available">Available</option>
            <option value="Booked">Booked</option>
            </select></div>

            <div class="right">
            <label for="ptype">Property Type</label><br>
            <select name="type" id="rclass">
            <option value="choose">choose one</option>
            <option value="Room">Room</option>
            <option value="Flat">Flat</option>
            <option value="House">House</option>
            </select></div>

            <div class="left">
            <label for="desc">Property description:</label><br>
            <input type="text" id="long" name="desc" placeholder="Some details about room"></div>

            <div class="left">
            <label for="image">House front picture:</label><br><br></div>
            <input type="file" id="pic1" name="upload" accept=".jpg, .jpeg, .png"><br>
            <p>Maximum file size: 3 MB</p>
            
            <?php
            if(isset($_POST['submit'])){
            $filename1 = $_FILES['upload']['name'];
            $tempname1 = $_FILES['upload']['tmp_name'];
            $folder1 = "images1/".$filename1;
            $result1 = move_uploaded_file($tempname1, $folder1);
            echo "<script>console.log($result1);</script>";
            echo "<script>console.log('sucessfull 1 Image Uploaded');</script>";
            }else{
                echo "<script>console.log('failed to upload image');</script>";
            }
            ?>
            

            <div class="pic">
            <label for="pic">Room Picture:</label><br><br>
            <input type="file" id="pic2" name="image" accept=".jpg, .jpeg, .png"><br>
            <p>Maximum file size: 3 MB</p></div>
            <?php
            if(isset($_POST['submit'])){
                $filename2 = $_FILES['image']['name'];
                $tempname2 = $_FILES['image']['tmp_name'];
                $folder2 = "images2/".$filename2;
                $result2 = move_uploaded_file($tempname2, $folder2);
                echo "<script>console.log('sucessfull Image Uploaded 2');</script>";
                }else{
                    echo "<script>console.log('failed to upload image 2');</script>";
                }
                //echo "<img src = '$folder' height='100px' width='100px'>" ;
                ?>
                

            <div class="end">
                <h3>Terms and Conditions</h3>
                <input type="checkbox"><p id="terms"> By clicking I agree that I will not rent my room to others</p></div>

            <div class="button">
                <input type="submit" id="submit" name="submit" value="Post room">
            </div>

</form>
</div>
    
<?php include '../footer/footer.html'; ?> 
</body>
</html>

<?php
include 'connection.php';

if(isset($_POST['submit'])){

    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $plocation = $_POST['location'];
    $neighbour = $_POST['neighbour'];
    $roomsize = $_POST['rsize'];
    $nobedroom = $_POST['nbedroom'];
    $rentpermonth = $_POST['rpmonth'];
    $price = $_POST['price'];

    $amenties = $_POST['amenties'];
    /*$amenties = implode(",",$amenti);*/

    echo "<script>console.log($amenties);</script>";


    $furunfur = $_POST['furunfur'];
    $status = $_POST['status'];
    $type = $_POST['type'];
    $description = $_POST['desc'];
    //$folders = implode(',',$folder);
    //echo "<script>console.log($folders);</script>";

    include 'connection.php';

    $query = "INSERT INTO postroom(fullname, email,phone, gender, plocation, neighbour, roomsize, nobedroom, rentpermonth, price, amenties, furunfur, status, type, description, images1, images2) VALUES('$fullname','$email','$phone','$gender','$plocation','$neighbour','$roomsize',
    '$nobedroom','$rentpermonth','$price','$amenties','$furunfur','$status','$type','$description','$folder1', '$folder2')";
    $res = mysqli_query($conn, $query);

    echo "<script>console.log($res);</script>";
    


    if ($res) {

    echo "<script>alert('Data inserted successfull');</script>";
  

    }else {
    echo "<script>alert('failed to insert data');</script>";
    }

}

?>


