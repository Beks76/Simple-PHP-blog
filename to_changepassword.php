<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $uri = "edit_profile.php?error";

        session_start();
        if(isset($_SESSION['user'])){
            
            if(isset($_POST["old_password"])&&isset($_POST["new_password"])){

                require_once "db.php";

                if($_POST['old_password']===$_SESSION['user']['Password']){

                    if(updatePassword($_SESSION['user']['ID'],$_POST['new_password'])) {
                        $_SESSION['user']['Password'] = $_POST['new_password'];
                        
                        $uri = "edit_profile.php?success";
                    }
                }
            }
        }
    }

    header("Location:$uri");
?>