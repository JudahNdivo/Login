<?php
session_start();
include('dbcon.php');


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the user's email from the session
$email = $_SESSION['email'];

// Delete the user's data from the database
$query = "DELETE FROM the_users WHERE email = '$email'";
$result = mysqli_query($con, $query);

if ($result) {
    // Destroy the session
    session_destroy();

    // Redirect to the homepage
    header("Location: indexx.php");
    exit;
} else {
    // Handle error, e.g., display an error message or log the error
    echo "Error deleting account: " . mysqli_error($con);
}

mysqli_close($con);