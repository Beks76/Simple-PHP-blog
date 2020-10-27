<?php
	
	$uri = "index.php";

	if($_SERVER["REQUEST_METHOD"]=="POST"){

		$uri = "edit_profile.php?error";

		session_start();

		if(isset($_SESSION['user'])){

			if(isset($_POST["name"])&&isset($_POST["email"])){

				require_once "db.php";

				if(updateUser($_SESSION['user']['ID'],$_POST['email'],$_POST['name'])){
				    $_SESSION['user']['Full_Name'] = $_POST['name'];
				    $_SESSION['user']['Email'] = $_POST['email'];

                $uri = "edit_profile.php?success";
                }

			}

		}

	}


	header("Location:$uri");

?>