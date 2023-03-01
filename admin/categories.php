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
                           <?php ?>
                            <form action="categories.php" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add category</label>
                                    <input class="form-control" type="text" name="cat_title" >
                                </div>
                                <?php add_category(); ?>
                                <div class="form-group">
                                    <input  class="btn btn-primary"
                                            type="submit" 
                                            name="add" 
                                            value="Add Category"
                                    >
                                </div>
                            </form>
                            
                            <?php 
                                if(isset($_GET['edit'])){
                                    $cat_id = $_GET['edit'];
                                    include"includes/update-category.php";
                                }
                            ?>
                            
                        </div>

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
                                        show_all_categories();
                                    ?>

                                    <?php
                                        delete_category();
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
