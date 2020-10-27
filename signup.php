<?php session_start(); ?>

<?php include 'views/head.php' ?>

    <div class="sidenav">
        <div class="login-main-text">
            <h2>Mynews<br> Register Page</h2>
            <p>Register from here to access.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-4 col-sm-12">
            <div class="login-form">
                <form>
                    <p class="msg none">Lorem ipsum dolor sit amet.</p>
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
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" class="form-control" name="conf_password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn register">Register</button>
                    <a href="index.php" class="btn btn-secondary">Sign in</a>
                </form>
            </div>
        </div>
    </div>

<?php include 'views/footer.php'?>