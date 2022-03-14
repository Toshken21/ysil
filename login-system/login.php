<?php
session_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form action="database.php" method="GET">
        <label for="username">Username: </label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:
        </label>
        <input type="text" name="password" required>
        <br>
        <br>
        <input type="submit" value= "login" id="submit">
        
        <a href="register.php">Register</a>
        <a href="../password-recovery/forgot-password.html">Forgot your password?</a>
        
    </form>
    
</body>
</html>