<?php
session_start();
include "connection.php";
if (isset($_POST["login"])){   

    $email = $_POST["email"];
    $password = $_POST["password"];


    $sql = "SELECT * FROM admin WHERE email = '$email' and password='$password'";

    $result = mysqli_query($conn,$sql);
    // $user=mysqli_fetch_array($result);
    if(mysqli_num_rows($result)){
        $_SESSION['email'] = $_POST['email'];
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
        }
        echo"<script type='text/javascript'>
        window.location.href = '';
        </script>";
    }else{
        echo "<script type='text/javascript'>
        alert('please enter right email and password')
        window.location.href = '';
        </script>";
    }

}


?>


<html>
    <head>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script type="text/javascript" src="login.js"></script> 
        <title>
</title>
    </head>
    <body>



<div class="container">

    <div class="login">
        
    <h2>Admin Login</h2><br>
    <form id="login" onsubmit="return validateForm()" method="POST" action="login.php">
        <label><b>Email/Username</b></label>
        <input type="text" name="email" id="email" placeholder="Email"><br>
        <p id="emailerr" class="error"></p>
        <br>
        <label><b>Password</b></label>
        <input type="Password" name="password" id="Pass" placeholder="Password">
        <p id="passerr" class="error"></p>
        <br>
        <input type="submit" name="login" id="log" value="Log In">
        <br><br>
        <a href="#">Forgot Password?</a><br><br>
    </form>
</div>
</div>
</body>
</html>