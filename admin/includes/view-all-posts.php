<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $myQuery = "SELECT * FROM posts";
            $result = mysqli_query($conn, $myQuery);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['post_id']}</td>
                        <td>{$row['post_author']}</td>
                        <td>{$row['post_title']}</td>
                        <td>{$row['post_category_id']}</td>
                        <td>{$row['post_status']}</td>
                        <td><img class='img-responsive' src='../imgs/{$row['post_image']}' alt='image'></img></td>
                        <td>{$row['post_tags']}</td>
                        <td>{$row['post_content']}</td>
                        <td>{$row['post_date']}</td>
                        <td><a href= 'posts.php?source=edit_post&p_id={$row['post_id']}'>Edit</a></td>
                        <td><a href= 'posts.php?delete={$row['post_id']}'>Delete</a></td>
                </tr>";
            }
        ?>
    </tbody>
</table>

<?php 
    if(isset($_GET['delete'])){
        $post_id = $_GET['delete'];
        $deleteQuery = "DELETE FROM posts WHERE post_id = {$post_id}";
        $result = mysqli_query($conn, $deleteQuery);
        header("Location: posts.php");
    }

?>