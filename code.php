<?php 
session_start();
include('dbcon.php');

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($name, $email, $verify_token){
   //Create an instance; passing `true` enables exceptions
   $mail = new PHPMailer(true);

}
if(isset($_POST['register_btn'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());

    //Check whether email exists or not:
    $check_email_query = "SELECT * FROM the_users WHERE email = '$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if($mysqli_num_rows($check_email_query_run) > 0){
       $_SESSION['status'] = "Email Already Exists";
        header('Location: registerr.php');
    }else{
        //Insert user data
        $query = "INSERT INTO the_users (name, phone, email, password, verify_token) VALUES ('$name', '$phone', '$email', '$password', '$verify_token')";
        $query_run = mysqli_query($con, $query);

        if($query_run){
            sendemail_verify("$name", "$email", "$verify_token");
            $_SESSION['status'] = "Registration Successful!Verify Your Email";
            header('Location: verifyy.php');

    }else{
        $_SESSION['status'] = "Registration Failed";
        header('Location: registerr.php');
    }
}
}
?>