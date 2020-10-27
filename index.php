<?php session_start(); ?>

<?php include 'views/head.php' ?>

    <div class="sidenav">
        <div class="login-main-text">
            <h2>Mynews<br> Login Page</h2>
            <p>Login or register from here to access.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-4 col-sm-12">
            <div class="login-form">
                <form>
                    <p class="msg none"> Lorem ipsum dolor sit amet. </p>
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

<?php include 'views/footer.php'?>