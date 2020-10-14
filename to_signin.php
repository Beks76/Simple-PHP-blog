<?php
   $url="signin.php?error";

   if($_SERVER['REQUEST_METHOD']=='POST'){
       if(isset($_POST['email'])&&isset($_POST['password'])){
           require_once 'db.php';
           $user=getUser($_POST['email']);
           echo $user;
           if($user!=null){
               if($user['Password']==$_POST['password']){
               session_start();
               $_SESSION['user']=$user;
                    setcookie('user_email', $user['email'], time()+60*60);
                    setcookie('user_password', $user['password'], time()+60*60);
                    header("Location:index.php");
               $url="index.php";
               }
           }
       }
   }
   header("Location:$url");
?>