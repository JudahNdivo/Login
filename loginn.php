<?php 
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
                    <form action="">
                       
                        <div class="form-group mb-3">
                          <label for="name">Email Address</label>
                           <input type="email" name="email" id="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                          <label for="password">Password</label>
                           <input type="password" name="password" id="password" class="form-control">
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