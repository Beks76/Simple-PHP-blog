<?php
	session_start();
	if(isset($_SESSION['user'])){
		$user=$_SESSION['user'];
	require_once 'db.php';
?>

<?php include('head.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="add d-flex mt-4 justify-content-center">
                    <div class="add__symbol">
                        <a href="write_post.php" class="btn btn-black">Write a post</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="offer d-flex mt-4 justify-content-center">
                    <div class="offer__title">
                        <h2>Latest posts</h2>
                    </div>
                </div>
            </div>
            <?php
                $posts = getPosts();
                foreach(array_reverse($posts) as $ps) {
                    $byuser = getUserbyID($ps['User_Id']);
            ?>
                <div class="col-lg-4">
                    <div class="card text-center mt-4">
                        <div class="card-header">
                            <p class="card-text"> by <a href="#"><?php echo $byuser['Full_Name']?></a></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $ps['Title'] ?></h5>
                            <p class="card-text"><?php echo $ps['Description'] ?></p>
                            <a href="single_blog.php?id=<?php echo $ps['ID'] ?>" class="btn btn-primary">Read more</a>
                        </div>
                        <div class="card-footer text-muted">
                            <?php echo $ps['Publish_date'] ?>
                        </div>
                    </div>
                </div>

            <?php
                }
            ?>
        </div>
    </div>
    
</body>
</html>
<?php }
else{
	header('Location:signin.php');
	}
?>