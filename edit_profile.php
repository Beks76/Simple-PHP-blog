<?php
	session_start();
	if(isset($_SESSION['user'])){
		$user=$_SESSION['user'];
    require_once 'db.php';
    
?>
<?php include('head.php'); ?>


<div class="container">
    <?php if(isset($_GET['success'])) {?>
        <div class="alert alert-success" role="alert">
            Updated!
        </div>       
    <?php } ?>
    <div class="row">
        <form action="to_editprofile.php" method="POST">
            <h3 class="mt-4">Edit profile</h3>
            <div class="form-group">
                <label for="">Name:</label>
                <input type="text" name="name" class="form-control" placeholder="<?php echo $user['Full_Name']?>">
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="text" name="email" class="form-control" placeholder="<?php echo $user['Email']?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-black">Update a profile</button>
            </div>
        </form>
    </div>
    <div class="row">
        <form action="to_changepassword.php" method="POST">
            <h3 class="mt-4">Edit password</h3>
            <div class="form-group">
                <label for="">Old password:</label>
                <input type="password" name="old_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">New password:</label>
                <input type="password" name="new_password" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-black">Update a profile</button>
            </div>
        </form>
    </div>
</div>



<?php }
else{
	header('Location:signin.php');
	}
 ?>