<?php
session_start();
include('dbcon.php'); // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check user credentials in the database
    $query = "SELECT * FROM the_users WHERE email = ? AND password = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, fetch data and set session
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id']; // Save user ID in session
        $_SESSION['email'] = $user['email']; // Optional: save email in session
        
        // Redirect to the dashboard page
        header('Location: dashboardd.php');
        exit;
    } else {
        $_SESSION['status'] = "Invalid login credentials.";
        header('Location: loginn.php');
        exit;
    }
}
?>
