<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<?php include("style.php"); ?>

<div class="sidenav">
    <div class="login-main-text">
        <h2>Mynews<br> Register Page</h2>
        <p>Register from here to access.</p>
    </div>
</div>
<div class="main">
    <div class="col-md-4 col-sm-12">
        <div class="login-form">
            <?php if(isset($_GET['error'])) {?>
                <div class="alert alert-danger" role="alert">
                    Registration Error
                </div>       
                <?php } ?>
                <?php if(isset($_GET['success'])) {?>
                <div class="alert alert-success" role="alert">
                    Registration Completed
                </div>     
            <?php } ?>
            <form action="to_signup.php" method="POST">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="full_name" placeholder="First Name and Surname ">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-black">Register</button>
                <a href="signin.php" class="btn btn-secondary">Sign in</a>
            </form>
        </div>
    </div>
</div>
