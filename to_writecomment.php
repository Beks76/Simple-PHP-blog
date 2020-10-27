<?php
    session_start();
    $post_id = ($_GET['id']);
    if(isset($_SESSION['user'])){
        $user=$_SESSION['user'];
    }

    $uri = "?id=$post_id";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['comment'])){
            require_once 'db.php';
            if(addComments($user['ID'], $post_id, $_POST['comment'])) {
                header("Location:index.php");            
            }
        }
    }

    header("index.php");


?>