<!DOCTYPE html>
<html lang="en">

<?php include "includes/header.php"?> 

<body>
    
    <div id="wrapper">
        <!-- Navigation -->
       <?php include "includes/navbar.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            ADMINISTRATOR
                            <small>Nghia md</small>
                        </h1>
                        <div class="col-xs-6">

                            <?php 
                                if(isset($_POST['submit'])){
                                    $cat_title = $_POST['cat_title'];
                                    if($cat_title == "" || empty($cat_title)){
                                        echo "This title should not be empty";
                                    }else{
                                        $insertQuery = "INSERT INTO category(cat_title)";
                                        $insertQuery.=" VALUES('{$cat_title}')";
                                        $add_category = mysqli_query($conn, $insertQuery); 
                                        if(!$add_category){
                                            die("Smt wrong when adding new category !". mysqli_error($conn));
                                        }
                                    }

                                }
                            ?>
                            <form action="categories.php" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Category Title</label>
                                    <input type="text" name="cat_title">
                                </div>

                                <div class="form-group">
                                    <input  class="btn btn-primary"
                                            type="submit" 
                                            name="submit" 
                                            value="Add Category"
                                    >
                                </div>
                            </form>
                        </div>

                        <?php 
                            $categoriesQuery = "SELECT * FROM category";
                            $result = mysqli_query($conn, $categoriesQuery);   
                        ?>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Category Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        while($row = mysqli_fetch_assoc($result)){
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            echo "<tr>
                                                    <td>$cat_id</td>
                                                    <td>$cat_title</td>
                                                    <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
                                                </tr>";
                                        }
                                        
                                    ?>

                                    <?php 
                                        if(isset($_GET['delete'])){
                                            $cat_id = $_GET['delete'];
                                            $deleteQuery = "DELETE FROM category WHERE cat_id = {$cat_id}";
                                            $delete = mysqli_query($conn, $deleteQuery);
                                            header("Location: categories.php");
                                        }
                                        
                                        
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php include "includes/footer.php"?>

</body>

</html>
