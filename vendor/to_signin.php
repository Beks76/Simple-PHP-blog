<?php
    if(isset($_SESSION['user'])){
        session_destroy();
    }
    session_start();

    require_once 'db.php';
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = getUser($email);
    
    $error_fields = [];

    if($email == '') {
        $error_fields[] = 'email';
    }

    if($password == '') {
        $error_fields[] = 'password';
    }

    if(!empty($error_fields)) {

        $res = [
            "status" => false,
            "message" => 'Check the fields',
            "type" => 1,
            "fields" => $error_fields
        ];

        echo json_encode($res);
    }
    else {
        $password = md5($password);
        if($user != null) {
            if($user['Password'] == $password) {
                $_SESSION['user'] = [
                    "id" => $user['Id'],
                    "full_name" => $user['Full_Name'],
                    "email" => $user['Email']
                ];
    
                $res = [
                    "status" => true
                ];
    
                echo json_encode($res);
            }
            else {
                $res = [
                    "status" => false,
                    "message" => 'Wrong password or email'
                ];
    
                echo json_encode($res);
            }
        }
        else {
            $res = [
                "status" => false,
                "message" => 'There is no such mail account'
            ];
    
            echo json_encode($res);
        }
    
    }


?>

