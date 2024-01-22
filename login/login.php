<?php
    session_start();
    include "connection.php";
    if (isset($_POST["login"])){   

        $email = $_POST["email"];
        $password = $_POST["password"];


        $sql = "SELECT * FROM user WHERE email = '$email' and password='$password'";

        $result = mysqli_query($conn,$sql);
        // $user=mysqli_fetch_array($result);
        if(mysqli_num_rows($result)){
            $_SESSION['email'] = $_POST['email'];
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['id'] = $row['id'];
            }
            echo"<script type='text/javascript'>
            window.location.href = '../pstroom/home.php';
            </script>";
        }else{
            echo "<script type='text/javascript'>
            alert('please enter right email and password')
            window.location.href = 'login.php';
            </script>";
        }

    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script type="text/javascript" src="login.js"></script> 
    <style>
        .error{
            color: red;
            margin: 5px;
            text-align: left;
        }
    </style>

</head>




<body>

<?php include ('../header/header1.php'); ?>
    
    <div class="container">

    <div class="login">
        
    <h2>Login Page</h2><br>
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
        <input type="checkbox" id="check">
        <span>Remember me</span>
        <br><br>
        <a href="#">Forgot Password?</a><br><br>
        <a href="#">Admin Login</a>
    </form>
</div>
</div>
<div class="foot">
<?php include "../footer/footer.html"; ?>
    </div>
</body>
</html>

