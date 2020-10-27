<?php
    session_start();
    if(isset($_SESSION['user'])){
        $user=$_SESSION['user'];
        require_once '../vendor/db.php';
        $post_id = intval($_GET['id']);
?>

<?php
    $post = getPostbyId($post_id);
?>

<?php include '../views/head_p.php' ?>
    <?php include '../views/navbar.php' ?>

    <div class="container">

<div class="row">

  <div class="col-lg-8">

    <h1 class="mt-4"><?php echo $post[0]['Title'] ?></h1>
    <p class="lead">by<a href="#"> <?php echo $post[0]['userName'] ?> </a></p>
    <hr>
    <p><?php echo $post[0]['category'] ?></p>
    <hr>
    <p><?php echo $post[0]['Description'] ?></p>
    <hr>
    <p class="lead"><?php echo $post[0]['Content'] ?></p>
    <hr>
    <p>Published: <?php echo $post[0]['Publish_date'] ?></p>
    <hr>

</div>

<?php include '../views/footer_p.php'?> 
<?php 
    }
    else {
        header('Location:index.php');
    }
?>