<?php 
session_start();
$page_title = "Edit Profile";
include('includess/headerr.php');
include('includess/navbarr.php'); 
include('dbcon.php'); 
?>

<div class="py-5"> 
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="card-header">
                       <h4>Edit Profile</h4> 
                    </div>
                    <div class="card-body">
                        <?php
                        // Fetch user data from database
                        $email = $_SESSION['email']; // assuming you stored the email in session
                        $query = "SELECT * FROM the_users WHERE email = '$email'";
                        $result = mysqli_query($con, $query);
                        $user_data = mysqli_fetch_assoc($result);

                        // Display edit form
                        ?>
                        <form action="update_profile.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="name">Username</label>
                                <input type="text" name="name" value="<?php echo $user_data['name']; ?>" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="<?php echo $user_data['email']; ?>" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" value="<?php echo $user_data['phone']; ?>" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>

                    </div>
                </div>
                

            </div>
        </div>

    </div>

</div> 
<?php include('includess/footerr.php'); ?>