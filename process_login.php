<?php
session_start();
include('dbcon.php'); 

// Check if form data is submitted
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists
    $query = "SELECT * FROM the_users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // If user is found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Check if the password matches
        if (password_verify($password, $user['password'])) {
            // Generate a verification code
            $verification_code = rand(100000, 999999);  // Random 6-digit code
            
            // Save the code to the session or database
            $_SESSION['verification_code'] = $verification_code;
            $_SESSION['user_email'] = $email;

            // Send the verification code to the user's email
            mail($email, "Verification Code", "Your verification code is: $verification_code");

            // Redirect to the verification page
            header("Location: verifyy.php");
            exit;
        } else {
            // Invalid password
            echo "Invalid password.";
        }
    } else {
        // User not found
        echo "No user found with that email.";
    }
}
?>
