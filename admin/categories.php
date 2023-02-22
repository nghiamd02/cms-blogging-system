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
                            <form action="">
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
                                                </tr>";
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
