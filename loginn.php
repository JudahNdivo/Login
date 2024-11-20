<?php 
session_start(); // Start the session
$page_title = "Login Form";
include('includess/headerr.php');
include('includess/navbarr.php'); 
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
           <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Login Form</h5>
                </div>
                <div class="card-body">
                    <?php
                    // Display error message if it exists
                    if (isset($_SESSION['error'])) {
                        echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
                        unset($_SESSION['error']); // Clear the error message after displaying it
                    }
                    ?>
                    <form action="login_config.php" method="POST">
                        <div class="form-group mb-3">
                          <label for="name">Email Address</label>
                           <input type="email" name="email" id="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                          <label for="password">Password</label>
                           <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                      
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Login Now</button>
                        </div>
                    </form>

                </div>
            </div>
            
           </div>
        </div>
        </div>
    </div>

<?php include('includess/footerr.php'); ?>