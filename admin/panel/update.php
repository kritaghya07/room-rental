<?php 
include("../connection.php");
$id = $_GET['uid'];

$query = "SELECT * FROM user where uid = '$id'";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" >
    <title>Update Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0">
    <link rel="stylesheet" href="update.css" >
  </head>

  <body>  
    

    <div class="container">
      <h1 class="form_title">Update Details</h1>
      <form action="#" method="POST">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Full Name</label>
            <input type="text" value="<?php echo $result['fullname']; ?>" id="fullName" name="fname" placeholder="Enter Full Name">
          </div>
          <div class="user-input-box">
            <label for="username">Username</label>
            <input type="text" value="<?php echo $result['username']; ?>" id="username" name="uname" placeholder="Enter Username">
          </div>
          <div class="user-input-box">
            <label for="address">Address</label>
            <input type="text" value="<?php echo $result['address']; ?>" id="address" name="add" placeholder="Enter Address">
          </div>
          <div class="user-input-box">
            <label for="Email">Email</label>
            <input type="text" value="<?php echo $result['email']; ?>" id="email" name="email" placeholder="Enter Email">
          </div>
          <div class="user-input-box">
            <label for="password">Password</label>
            <input type="password" value="<?php echo $result['password']; ?>" id="password" name="pass" placeholder="Enter Password">
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" value="<?php echo $result['cpassword']; ?>" id="confirmPassword" name="conf" placeholder="Confirm Password">
          </div>
          <div class="user-input-box">
            <label for="phone">Phone</label>
            <input type="text" value="<?php echo $result['phone']; ?>" id="phone" name="phone" placeholder="Phone">
        </div>
        
        <div class="submitbtn">
          <input type="submit" value="Update" name="submit"></div>

</form>


</body>
</html>


<?php
include 'connection.php';

if (isset($_POST['submit'])) {   //get data from user after clicking submit
  
  $fullname = $_POST['fname'];
  $username = $_POST['uname'];
  $address = $_POST['add'];
  $email = $_POST['email'];
  $password = $_POST['pass'];
  $cpassword = $_POST['conf'];
  $passwordhas = password_hash($password,PASSWORD_DEFAULT);
  $phone = $_POST['phone'];

  //form validate using php
  $error = array();
  if(empty($fullname)OR empty($username) OR empty($address) OR empty($email) OR empty($password) OR empty($cpassword) OR empty($phone)){
    array_push($error, "<p class='err'> All fields are required </p>");
  }
  /*if(!preg_match("/^[a-zA-z]*$/",$fullname)){
    array_push($error,"<p style='color:red;'>Fullname is not valid</p>");
  }*/
  if(filter_var(!$email, FILTER_VALIDATE_EMAIL)){
    array_push($error,"<p style='color:red;'>Email is not valid</p>");
  }
  if(strlen($password)<8){
    array_push($error,"<p style='color:red;'>Password must be atleast 8 character</p>");
  }
  if(!preg_match("/^[0-9]*$/",$phone)){
    array_push($error,"Phone contain only numeric value");
  }
  if(strlen($phone)!=10){
    array_push($error,"<p style='color:red;'>phone must contain 10 digits</p>");
  }
  if($password!==$cpassword){
    array_push($error,"<p style='color:red;'>confirm password not match</p>");
  
  }else{
    include "../connection.php";



  $query = "UPDATE user set fullname='$fullname',username='$username',address='$address',email='$email',password='$password',cpassword='$cpassword',phone='$phone' WHERE id='$id'";
  $res=mysqli_query($conn,$query);


  if ($res) {

    echo "<script>alert('Record Updated')</script>";
    

  }else {
    echo "<script>alert('Failed to update')</script>";
  }
}
}

?>
