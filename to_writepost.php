<?php 
    session_start();
	if(isset($_SESSION['user'])){
        $user=$_SESSION['user'];
    }

    $uri = "?error";
    if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['title'])&&isset($_POST['descr'])&&isset($_POST['content'])){
			require_once 'db.php';
			if(addPost($user['ID'], $_POST['title'], $_POST['descr'],  $_POST['content'])) {
                $uri = "?success";
            }
		}
    }
    header("Location:write_post.php$uri");


?>