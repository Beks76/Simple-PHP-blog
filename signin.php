<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<?php include("style.php"); ?>

<div class="sidenav">
    <div class="login-main-text">
        <h2>Mynews<br> Login Page</h2>
        <p>Login or register from here to access.</p>
    </div>
</div>
<div class="main">
    <div class="col-md-4 col-sm-12">
        <div class="login-form">
            <?php if(isset($_GET['error'])) {?>
                <div class="alert alert-danger" role="alert">
                    Authorization Error
                </div>       
            <?php } ?>
            <form action="to_signin.php" method="POST">
                <div class="form-group">
                    <label>Login</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-black">Login</button>
                <a href="signup.php" class="btn btn-secondary">Register</a>
            </form>
        </div>
    </div>
</div>

<!-- 

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="sidenav">
                    <div class="login-main-text">
                        <h2>Mynews.com  <br> Login Page</h2>
                        <p>Login or register from here to access.</p>
                    </div>
                </div>
                <div class="main">
                    <div class="col-md-12 col-sm-12">
                        <div class="login-form">
                            <form method="post" action="to_signin.php">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="uname" class="form-control" placeholder="User Name">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-black">Login</button>
                                <a href="signup.php">Register</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html> -->