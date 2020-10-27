<?php
    session_start();
    if(isset($_SESSION['user'])){
          $user=$_SESSION['user'];
    $post_id = intval($_GET['id']);
    require_once('db.php');
?>

<?php include('head.php'); ?>

<?php
    $post = getPostsbyId($post_id);
    $byuser = getUserbyID($post['User_Id']);
    $comments = getComments();
?>

<div class="container">

    <div class="row">

      <div class="col-lg-8">

        <h1 class="mt-4"><?php echo $post['Title'] ?></h1>
        <p class="lead">by<a href="#"> <?php echo $byuser['Full_Name'] ?> </a></p>
        <hr>
        <p><?php echo $post['Description'] ?></p>
        <hr>
        <p class="lead"><?php echo $post['Post'] ?></p>
        <hr>
        <p>Published: <?php echo $post['Publish_date'] ?></p>
        <hr>

        <a href="delete_post.php?id=<?php echo $post_id ?>" class="btn btn-primary">Delete post</a>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="to_writecomment.php?id=<?php echo $post_id ?>" method="POST">
              <div class="form-group">
                <textarea class="form-control" name="comment" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        <?php foreach($comments as $cm) {
                  if($cm['Post_Id'] == $post_id) {  
        ?>
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">
              <?php
                $comment_user = getUserbyID(intval($cm['User_Id']));
                echo $comment_user['Full_Name'];
              ?>
               
              </h5>
              <?php echo $cm['Text'] ?>
            </div>
          </div>
        <?php 
          } 
        }
        ?>
</div>
<?php }
else{
	header('Location:signin.php');
	}
?>