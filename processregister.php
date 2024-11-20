<?php
session_start();
include('dbcon.php'); // Include the database connection script
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

if ($con === false) {
    die("ERROR: Could not connect. " . $con->connect_error);
}

function sendemail_verify($name, $email, $verify_token) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'huntjohn217@gmail.com'; // Your email
        $mail->Password   = 'ysys xjkz iigq xvba';   // Your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('huntjohn217@gmail.com', 'Your Name');
        $mail->addAddress($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body    = "Hi $name,<br><br>Your verification code is: <strong>$verify_token</strong><br><br>
                          Alternatively, you can verify your email by clicking the link below:<br>
                          <a href='http://localhost/Login/Login/verify_email.php?token=$verify_token'>Verify Email</a>";
        $mail->AltBody = "Hi $name,\n\nYour verification code is: $verify_token\n\n
                          Alternatively, you can verify your email by clicking the link below:\n
                          http://localhost/Login/Login/verify_email.php?token=$verify_token";

        $mail->send();
        // Don't redirect here; let the registration flow continue
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());

    // Store the verification token in a session variable
    $_SESSION['verify_token'] = $verify_token; // Store the token in session

    // Check if email already exists in the database
    $check_email_query = "SELECT * FROM the_users WHERE email = ? LIMIT 1";
    $stmt = $con->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['status'] = "Email Already Exists";
        header('Location: registerr.php');
        exit;
    } else {
        // Insert user data into the database
        $query = "INSERT INTO the_users (name, phone, email, password, verify_token) VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("sssss", $name, $phone, $email, $password, $verify_token);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            sendemail_verify($name, $email, $verify_token);
            $_SESSION['status'] = "Registration Successful! Verify Your Email";
            header('Location: verify_email.php');
            exit;
        } else {
            $_SESSION['status'] = "Registration Failed";
            header('Location: registerr.php');
            exit;
        }
    }
}
?>