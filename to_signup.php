<?php

    $uri = "?error";
    if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['full_name'])&&isset($_POST['email'])&&isset($_POST['password'])){
			require_once 'db.php';
			$user = getUser($_POST['email']);
			if($user==null){
				addUser($_POST['full_name'],$_POST['email'],$_POST['password']);
				$uri="?success";
			}
		}
    }
    header("Location:signup.php$uri");
?>