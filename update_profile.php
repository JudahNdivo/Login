<?php 
session_start();
include('dbcon.php');
// Update user data in database
$email = $_SESSION['email']; // assuming you stored the email in session
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$query = "UPDATE the_users SET name = '$name', email = '$email', phone = '$phone' WHERE email = '$email'";
$result = mysqli_query($con, $query);

if ($result) {
    $_SESSION['status'] = "Profile updated successfully!";
    header('Location: dashboardd.php');
    exit;
} else {
    $_SESSION['status'] = "Error updating profile!";
    header('Location: edit_profile.php');
    exit;
}
?>