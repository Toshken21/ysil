<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMAILER\PHPMailer\Exception;
require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';








$host = "localhost";
$user = "root";
$password = "";
$db = "metaverse";
$dbconnect = mysqli_connect("localhost", $user, $password, $db);
if ($dbconnect) {
    echo "connected to database";
} else {
    echo "not connected";
}

    if(isset($_POST["email"])) {
        $email = $_POST["email"];
        $sql = "select * from users where email='$email'";
        $result = mysqli_query($dbconnect, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck == 1) {
            $new_email = new PHPMailer(true);
            $new_email -> isSMTP();
            // code under testing
            $new_email -> SMTPDebug = 1;
            $new_email -> Host = 'smtp.sendgrid.net';
            $new_email -> SMTPAuth = true;
            $new_email -> Username = "apikey";
            $new_email -> Password = "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";
            $new_email -> SMTPSecure = "tls";
            $new_email -> Port = 587;
            // From email and name
            $new_email -> setFrom("anton.rader@gmail.com", "Anton");
            -
            // To email
            $new_email -> addAddress($email);
            // Make so that the email is written in html
            $new_email -> isHTML(true);
            
            // contents of the email
            $new_email -> Subject = "Password Recovery";
            $new_email -> Body = "<p>Click <a href='localhost/projects/metaverse/reset-password.html'>this link</a> to change your password.</>";

            // sending the mail
            try {
                $new_email -> send();
                echo "Message has been sent successfully";
                // sets a cookie containing the email. This will be used under recovery
                setcookie("email", $email, time() + 3600);
            } catch(Exception $e) {
                echo "Mailer error: " . $new_email -> ErrorInfo;
            }
        }
    }

    if(isset($_POST["password"]) and isset($_COOKIE["email"])) {
        $password = $_POST["password"];
        $cookie = $_COOKIE["email"];
        $sql = "update users set password='$password' where email='$cookie'";
        $result = mysqli_query($dbconnect, $sql);
        
        header("Location: login.php");
        

    } else {
        echo "Something went wrong!";
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>If the mail address is connected to one of our accounts, it has received an email containing instructions on how to recover your  password</h1>
</body>
</html>