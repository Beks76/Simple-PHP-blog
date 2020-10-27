<?php include('head.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="write_post mt-4">
                <form action="to_writepost.php" method="POST">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="descr" placeholder="Description(maximum 100 symbols)" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Post content</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="content" placeholder="Content" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-black">Write a post</button>
                </form>
            </div>
        </div>
    </div>
</div>