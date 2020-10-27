<?php
    session_start();
    if(isset($_SESSION['user'])){
        $user=$_SESSION['user'];
        require_once '../vendor/db.php';
?>

<?php include '../views/head_p.php' ?>

    <?php include '../views/navbar.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="add d-flex mt-4 justify-content-center">
                    <div class="add__symbol">
                        <a href="#" class="btn write">Write a post</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="post none">
                    <center>
                        <button class="btn hide mt-4">Hide</button>
                    </center>
                    <form>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                        </div>
                        <div class="form-group">
							<label for="">Category</label>
							<select class="form-control" id="category" name="category">
							</select>
						</div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="descr" name="descr" placeholder="Description(maximum 100 symbols)" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Post content</label>
                            <textarea class="form-control" id="content" name="content" placeholder="Content" rows="5"></textarea>
                        </div>
                        <center>
                            <button type="submit" id="addPost" class="btn btn-black">Post</button>
                        </center>   
                        <div class="msg none mt-4">Lorem ipsum dolor sit amet.</div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="offer d-flex mt-4 justify-content-center">
                    <div class="offer__title">
                        <h2>Latest posts</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="md-form active-cyan-2 mb-3">
                    <input id="search_post" class="form-control" type="text" placeholder="Search" aria-label="Search">
                </div>
            </div>
        </div>
        <div class="categories d-flex justify-content-center">
            <button val="on" class="btn cat" filter="0">All</button>
            <?php
                $categories = getAllCategories();
                foreach($categories as $cat){
            ?>
            <button val="off" class="btn cat" filter="<?php echo $cat['Name'] ?>"><?php echo $cat['Name'] ?></button>
            <?php } ?>
        </div>
        <center>
        <div class="col-lg-4">
            <div class="form-group">
                <center class="mt-4">
                    <button class="btn filter" order="1">Ascending</button>
                    <button class="btn filter" order="2">Descending</button>
                </center>
            </div>
        </div>
        </center>
        <div id="post_block" class="row">
        </div>
    </div>

<?php include '../views/footer_p.php'?>

<?php }
else{
	header('Location:index.php');
	}
?>
