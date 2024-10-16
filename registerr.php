<?php 
$page_title = "Registration Form";
include('includess/headerr.php');
include('includess/navbarr.php'); 
?>

<div class="py-5">
    <div class="container">
        <div class="row">
           <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Registration Form</h5>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group mb-3">
                          <label for="name">Name</label>
                           <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                          <label for="name">Phone Number</label>
                           <input type="number" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                          <label for="name">Email Address</label>
                           <input type="email" name="email" id="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                          <label for="password">Password</label>
                           <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                          <label for="name">Confirm Password</label>
                           <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Register Today</button>
                        </div>
                    </form>

                </div>
            </div>
            
           </div>
        </div>
        </div>
    </div>


<?php include('includess/footerr.php'); ?>