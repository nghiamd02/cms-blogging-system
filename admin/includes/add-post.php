<?php 
    if(isset($_POST['create_post'])){
        $post_title   = $_POST['title'];
        $post_author  = $_POST['author'];
        $post_cat_id  = $_POST['cat_id'];
        $post_status  = $_POST['status'];
        $post_img     = $_FILES['image']['name'];
        $post_img_tmp = $_FILES['image']['tmp_name'];
        $post_tags    = $_POST['tags'];
        $post_content = $_POST['content'];
        $post_date = date('d-m-y');
        $post_comment_count = 4;

        move_uploaded_file($post_img_tmp, "../imgs/$post_img");

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comments_count, post_status)";
        $query.=" VALUES(${post_cat_id}, '{$post_title}', '{$post_author}', now(), '{$post_img}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";

        $result = mysqli_query($conn, $query);
       
    }

?>

<form form form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="cat_id">Post Category Id</label>
        <input type="text" class="form-control" name="cat_id">
    </div>

    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" class="form-control" name="status">
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>

    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="tags">
    </div>

    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>

</form>