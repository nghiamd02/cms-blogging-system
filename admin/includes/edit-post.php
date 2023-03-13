<?php 
    if(isset($_GET['source'])){
        $post_id = $_GET['p_id'];
        $query = "SELECT * FROM posts p WHERE p.post_id = {$post_id} ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
            // <td><img class='img-responsive' src='../imgs/{$row['post_image']}' alt='image'></img></td>
        $author = $row['post_author'];
        $title = $row['post_title'];
        $cat_id = $row['post_category_id'];
        $status = $row['post_status'];
        $image = $row['post_image'];
        $tag = $row['post_tags'];
        $content = $row['post_content'];
        $date = $row['post_date'];
    }
?>


<form form form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" <?php echo "value='${title}'" ?>>
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author" <?php echo "value='${author}'" ?>>
    </div>

    <div class="form-group">
        <select name="" id="">
            <?php 
                $selectQuery = "SELECT * FROM category";
                $result = mysqli_query($conn, $selectQuery);
                while ($row = mysqli_fetch_assoc($result)) {
                    $cat_id = $row['cat_id'];
                    $cat_name = $row['cat_title'];

                    echo "<option value='{$cat_id}'>{$cat_name}</option>";
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" class="form-control" name="status" <?php echo "value='${status}'" ?>>
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <img src="../imgs/<?php echo $image?>" alt="" width="100">
    </div>

    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="tags" <?php echo "value='${tag}'" ?>>
    </div>

    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea name="content" id="" cols="30" rows="10" class="form-control">
             <?php echo "${content}" ?>
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>

</form>