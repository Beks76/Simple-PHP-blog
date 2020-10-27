<?php 
    $id = $_POST['id'];

    $posts = getPostbyId($id);

    if(sizeof($posts) > 0) {
        echo json_encode($posts);
    }
    else {
        $res = [
            "status" => false,
            "message" => 'No data found'
        ];
        echo json_encode($res);
    }
?>