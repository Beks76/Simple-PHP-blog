<?php

    $post_id = intval($_GET['id']);

    $uri = "profile.php?error";

    session_start();

    require_once "db.php";

    if(deletePost($post_id)){
        $uri = "profile.php?success";
    }




	header("Location:$uri");

?>