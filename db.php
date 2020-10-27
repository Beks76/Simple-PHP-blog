<?php 

    try {
        $connection = new PDO('mysql:host=localhost; dbname=midterm', 'root', '');
    }
    catch(Exception $e) {
        echo '<h3> DB Error: '.$e->getMessage().'</h3>';
    }

    function addUser($full_name, $login, $password) {
        global $connection;
        $query = $connection->prepare("INSERT INTO users(id, email, password, full_name) VALUES(NULL, :e, :p, :n)");
        $rows = $query->execute(array("e"=>$login,"p"=>$password, "n"=>$full_name));
        return $rows > 0;
    }

    function updateUser($id, $email, $full_name) {
        global $connection;
		$query=$connection->prepare("UPDATE users 
			SET email=:e, full_name=:f_name
            WHERE id=:id
			 ");
		$rows=$query->execute(array("e"=>$email, "f_name"=>$full_name,"id"=>$id));
        return $rows>0;
        // $query = "UPDATE posts SET email=$email, full_name=$full_name WHERE id=$id";
        // $query_run = mysqli_query($connection, $query);
        // return $query_run;
    }

    function updatePassword($id, $newpassword) {
        global $connection;
		$query=$connection->prepare("UPDATE users 
			SET password=:p
            WHERE id=:id
			 ");
		$rows=$query->execute(array("p"=>$newpassword, "id"=>$id));
        return $rows>0;
    }

    function getUser($email) {
        global $connection;
		$query=$connection->prepare("SELECT * FROM users where email=:email");
		$query->execute(array("email"=>$email));
		$result=$query->fetch();
		return $result;
    }

    function getUserbyID($id) {
        global $connection;
		$query=$connection->prepare("SELECT * FROM users where id=:id");
		$query->execute(array("id"=>$id));
		$result=$query->fetch();
		return $result;
    }

    function getAllUsers() {
        global $connection;
        $query = $connection->prepare(
            "SELECT * FROM users"
        );
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    function addPost($user_id, $title, $description, $content) {
        global $connection;
        $query = $connection->prepare("INSERT INTO posts(id, user_id, title, description, post, Publish_date) VALUES(NULL, :u, :t, :descr, :p, :d)");
        $rows = $query->execute(array("u"=>$user_id, "t"=>$title, "descr"=>$description, "p"=>$content, "d"=>date("Y/m/d")));
        return $rows > 0;
    }
    
    function getPosts() {
        global $connection;
        $query = $connection->prepare(
            "SELECT * FROM posts"
        );
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    function getPostsbyId($post_id) {
        global $connection;
		$query=$connection->prepare("SELECT * FROM posts where id=:p_id");
		$query->execute(array("p_id"=>$post_id));
		$result=$query->fetch();
		return $result;
    }

    function deletePost($id) {
        global $connection;
		$query=$connection->prepare("DELETE FROM posts where id=:id");
		$rows=$query->execute(array("id"=>$id));
		return $rows>0;
    }

    function getComments() {
        global $connection;
		$query=$connection->prepare("SELECT * FROM comments");
		$query->execute();
		$result=$query->fetchAll();
		return $result;
    }

    function addComments($user_id, $post_id, $text) {
        global $connection;
        $query = $connection->prepare("INSERT INTO comments(id, user_id, post_id, text) VALUES(NULL, :u, :p, :t)");
        $rows = $query->execute(array("u"=>$user_id, "p"=>$post_id, "t"=>$text));
        return $rows > 0;
    }

?>