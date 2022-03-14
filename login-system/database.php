<?php

include "functions.php";
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "metaverse";
$dbconnect = mysqli_connect("localhost", $user, $password, $db);
/*
code that checks if we're connected to the database
if ($dbconnect) {
    echo "connected to database";
} else {
    echo "not connected";
}
*/

# This request creates an account
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $username = $_POST["username"];
    #echo $username;
    $password = $_POST["password"];
    #echo $password;
# These lines check if there already exists a user with that username and email to prevent the creation of duplicates
    $sql = "select * from users where user_name='$username' or email = '$email'";
    $result = mysqli_query($dbconnect, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0) {
        echo "user already exists";
        die();
    }

# These lines add a new user account to the sql database
    $user_id = random_num(12);
    $sql =  "insert into users (id, email, user_name, password) values ('$user_id', '$email', '$username', '$password')";
    $result = mysqli_query($dbconnect, $sql);
    

   
}

# This function will check if we're logging in from login.php and process it through the mysql database

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $username = $_GET["username"];
    $password = $_GET["password"];

    $sql = "select * from users where user_name = '$username' and password = '$password'";
    $result = mysqli_query($dbconnect, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck == 1) {
        echo "login successful";
        $_SESSION["username"] = $username;
        header("Location: home.php");
    } else {
        echo "login failed";
    }
}


?>