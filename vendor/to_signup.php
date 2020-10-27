<?php
    session_start();
    // if(isset($_SESSION['user'])){
    //     header('Location: ../profile.php');
    // }
    require_once 'db.php';

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_conf = $_POST['conf_password'];

    if($password === $password_conf) {
        $password = md5($_POST['password']);
        if(addUser($full_name, $email, $password)){
            $res = [
                "status" => true,
                "message" => 'Successfully Registered'
            ];
            
            echo json_encode($res);
        }
    }
    else {
        $res = [
            "status" => false,
            "message" => 'Passwords should be same'
        ];

        echo json_encode($res);
    }
?>