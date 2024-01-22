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
  }

  require_once "connection.php";
  $sql = "SELECT * FROM user WHERE email='$email'";
  $result=mysqli_query($conn,$sql);
  $rowCount=mysqli_num_rows($result);
  if($rowCount>0){
    array_push($error,"Email already exists");
  }

  if(count($error)>0){
    foreach($error as $error){
      echo "<div class='alert alert-danger'>$error</div>";
    }
  }else{
    require_once "connection.php";



  $query = "INSERT INTO user(fullname, username, address, email, password, cpassword, phone) VALUES('$fullname','$username','$address','$email','$password','$cpassword','$phone')";
  $res=mysqli_query($conn,$query);


  if ($res) {

    echo "<script>alert('Successfull register')</script>";
    

    header('location:../login/login.php');

  }else {
    echo "<script>alert('Failed to register')</script>";
  }
}
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" >
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0">
    <link rel="stylesheet" href="register1.css">
    <script type="text/javascript" src="register.js"></script>
    <style>
      .error{
        color: red;
        margin: 5px;
        text-align: left;
      }
      .err{
        color: red;
        margin-bottom: 0%;
      }
    </style>
  </head>

  <body>  
  <?php require_once ('../header/header1.php'); ?>
    
  

    <div class="container">

      <h1 class="form_title">Registration</h1>
      
      <form action="register.php" method="POST" onsubmit="return validateForm()" name="reg">
      <div class="main-user-info">

          <div class="user-input-box">
            <label for="fullName">Full Name</label>
            <input type="text" id="fullName" name="fname" placeholder="Enter Full Name">
            <p id="fname" class="error"></p>
          </div>
          <div class="user-input-box">
            <label for="username">Username</label>
            <input type="text" id="username" name="uname" placeholder="Enter Username">
            <p id="uname" class="error"></p>
          </div>
          <div class="user-input-box">
            <label for="address">Address</label>
            <input type="text" id="address" name="add" placeholder="Enter Address">
            <p id="add" class="error"></p>
          </div>
          <div class="user-input-box">
            <label for="Email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter Email">
            <p id="emailerr" class="error"></p>
          </div>
          <div class="user-input-box">
            <label for="password">Password</label>
            <input type="password" id="password" name="pass" placeholder="Enter Password">
            <p id="passerr" class="error"></p>
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="conf" placeholder="Confirm Password">
            <p id="cpass" class="error"></p>
          </div>
          <div class="user-input-box">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" placeholder="Phone">
            <p id="phone" class="error"></p>
        </div>
        
        <div class="submitbtn">
          <input type="submit" value="Register" name="submit"></div>

          </div>

</form>

  
        <div class="reg">
          <label for="newusr">Already Registered? <a href="../login/login.php" id="lo"> Login Here</a></label></div>

</div>

<div class="foot">
<?php include "../footer/footer.html"; ?>
</div>
</body>


</html>



