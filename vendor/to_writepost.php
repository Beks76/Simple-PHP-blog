<?php
    session_start();
    if(isset($_SESSION['user'])){
        $user=$_SESSION['user'];
    }
    require_once 'db.php';

    $title = $_POST['title'];
    $category = $_POST['category'];
    $descr = $_POST['descr'];
    $text = $_POST['text'];

    $error_fields = [];

    if($title == '') {
        $error_fields[] = 'title';
    }

    if($category == '') {
        $error_fields[] = 'category';
    }
    
    if($descr == '') {
        $error_fields[] = 'descr';
    }

    if($text == '') {
        $error_fields[] = 'content';
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
        if(addPost($user['id'], $title, $category, $descr, $text)){
            $res = [
                "status" => true,
                "message" => 'Successfully Added'
            ];
            
            echo json_encode($res);
        }
    }

?>