<?php

    try {
        $connection = new PDO('mysql:host=localhost; dbname=mynews', 'root', '');
    }
    catch(Exception $e) {
        echo '<h3> DB Error: '.$e->getMessage().'</h3>';
    }


    function addUser($full_name, $email, $password) {
        global $connection;
        $query = $connection->prepare("INSERT INTO users(id, full_name, email, password) VALUES(NULL, :f, :e, :p)");
        $rows = $query->execute(array("f"=>$full_name,"e"=>$email, "p"=>$password));
        return $rows > 0;
    }

    function checkUser($email, $password) {
        global $connection;
        $query = $connection->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
        $rows = $query->execute(array("email"=>$email, "password"=>$password));
        return $rows > 0;
    }

    function getUser($email) {
        global $connection;
		$query=$connection->prepare("SELECT * FROM users where email=:email");
		$query->execute(array("email"=>$email));
		$result=$query->fetch();
		return $result;
    }

    function getAllUsers() {
        global $connection;
        $query = $connection->prepare(
            "SELECT * FROM users"
        );
        $query->execute();
        $result = $query->fetch();
        return $result; 
    }
    
    function getUserbyID($id) {
        global $connection;
		$query=$connection->prepare("SELECT * FROM users where id=:id");
		$query->execute(array("id"=>$id));
		$result=$query->fetch();
		return $result;
    }

    function addPost($user_id, $title, $category_id, $description, $content) {
        global $connection;
        $query = $connection->prepare("INSERT INTO posts(id, user_id, title, category_id, description, content, Publish_date) VALUES(NULL, :u, :t, :c, :descr, :p, :d)");
        $rows = $query->execute(array("u"=>$user_id, "t"=>$title, "c"=>$category_id, "descr"=>$description, "p"=>$content, "d"=>date("Y/m/d")));
        return $rows > 0;
    }

    function getPosts() {
        global $connection;
        $query = $connection->prepare("
            SELECT p.Id, p.User_Id, p.Title, p.Description, p.Content, p.Publish_date, u.Full_Name AS userName, ca.Name AS category  
			FROM posts p
			LEFT OUTER JOIN users u ON u.Id = p.User_Id
            LEFT OUTER JOIN categories ca ON ca.id = p.Category_id
        ");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    function getPostbyId($id) {
        global $connection;
        $query = $connection->prepare("
            SELECT p.Id, p.Title, p.Description, p.Content, p.Publish_date, u.Full_Name AS userName, ca.Name AS category  
            FROM posts p
            LEFT OUTER JOIN users u ON u.Id = p.User_Id
            LEFT OUTER JOIN categories ca ON ca.id = p.Category_id
            WHERE p.Id = :id
        ");
        $query->execute(array("id"=>$id));
        $result = $query->fetchAll();
        return $result;
    }

    function getAllCategories() {
        global $connection;
		$query=$connection->prepare("SELECT * FROM categories");
		$query->execute();
		$result=$query->fetchAll();
		return $result;
    }

    function deletePost($id){
		global $connection;
		$query = $connection->prepare("DELETE FROM posts WHERE id = :id");
		$rows = $query->execute(array("id"=>$id));
		return $rows==1; 
	}
?>