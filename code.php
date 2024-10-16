<?php 
include('dbcon.php');
if(isset($_POST['register_btn'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //Check whether email exists or not:
    $check_email_query = "SELECT * FROM the_users WHERE email = '$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    
    
?>