<?php 
session_start(); // Start the session
$page_title = "Dashboard Page";
include('includess/headerr.php');
include('includess/navbarr.php'); 
include('dbcon.php'); // Include your database connection file

?>

<div class="py-5"> 
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="card-header">
                       <h4>User Dashboard</h4> 
                    </div>
                    <div class="card-body">
                        <?php
                        // Check if the user is logged in
                        if (!isset($_SESSION['email'])) {
                            echo "<p>You are not logged in. Please log in first.</p>";
                            exit; // Stop further execution
                        }

                        // Fetch user data from database
                        $email = $_SESSION['email']; // assuming you stored the email in session
                        $query = "SELECT * FROM the_users WHERE email = '$email'";
                        $result = mysqli_query($con, $query);

                        // Check if the query was successful
                        if (!$result) {
                            echo "Error fetching user data: " . mysqli_error($con);
                            exit; // Stop further execution
                        }

                        $user_data = mysqli_fetch_assoc($result);

                        // Check if user data was found
                        if (!$user_data) {
                            echo "<p>No user data found.</p>";
                            exit; // Stop further execution
                        }

                        // Display user data
                        ?>
                        <h2>Successful Login</h2>
                        <p>Username: <?php echo htmlspecialchars($user_data['name']); ?></p>
                        <p>Email: <?php echo htmlspecialchars($user_data['email']); ?></p>
                        <p>Phone: <?php echo htmlspecialchars($user_data['phone']); ?></p>

                        <!-- Edit button -->
                        <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>

                        <!-- Delete button -->
                        <a href="delete_account.php" class="btn btn-danger">Delete Account</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<?php include('includess/footerr.php'); ?>