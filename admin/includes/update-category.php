<form action="" method="post">
    <div class="form-group">
        <?php 
            if(isset($_GET['edit'])){
                $cat_id = $_GET['edit'];
                $selectQuery = "SELECT * FROM category WHERE cat_id = {$cat_id}";
                $getInfo = mysqli_query($conn, $selectQuery);
                while($row = mysqli_fetch_assoc($getInfo)){
                    $cat_title = $row['cat_title'];
        ?>
        <label for="cat_title">Edit category</label>
        <input value="<?php if(isset($cat_title)){echo $cat_title;}?>" class="form-control" type="text"
            name="cat_title">



        <?php }}?>

        <?php 
            if(isset($_POST['update'])){
                $cat_title = $_POST['cat_title'];
                if($cat_title == "" || empty($cat_title)){
                    echo "This title should not be empty";
                }else{
                    $updateQuery = "UPDATE category SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
                    $update_category = mysqli_query($conn, $updateQuery); 
                    if(!$update_category){
                        die("Smt wrong when updating new category !". mysqli_error($conn));
                    }
                    header("Location: categories.php");
                }
            }
        ?>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Update">
    </div>
</form>