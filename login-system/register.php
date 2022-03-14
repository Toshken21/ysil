<?php
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./register.css">
</head>
<body>
    <form action="database.php" method="POST">
        <label for="email">Email: </label>
        <input type="text" name="email" required>
        <br>
        <label for="username">Username: </label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:
        </label>
        <input type="text" name="password" required>
        <br>
        <label for="Re-enter password" id="bigtext">Re-enter password:</label>
        <input type="text" name="conf-password" required>
        <br>

        <input type="submit" name="register" value="register" id="submit">
        <a href="login.php">Login</a>
        
              
    </form>
    
</body>
</html>