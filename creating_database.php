<?php

$servername = "localhost";
$username = "root";
$password = "";

$database = "login";

//creating connection
$connection = new mysqli($servername, $username, $password);

//checking connection
if($connection->connect_errno !=0){
    die("Connection failed: ".$connection->connect_error);
}

//creating database
$sql = "CREATE DATABASE $database";

if($connection->query($sql)){
    echo "Database created successfully";
}else{
    echo "Error creating Database: ". $connection->error;
}

//selecting database
$connection->select_db($database);

echo "Database connected successfully";

echo "<pre>";
print_r($connection);
echo "</pre>";


// closing database connection

$connection->close();
