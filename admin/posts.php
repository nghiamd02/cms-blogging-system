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
                        <?php 
                            if (isset($_GET['source'])) {
                                $source = $_GET['source'];
                                
                            }else{
                                $source = "";
                            }
                            switch($source){
                                case "add_post":
                                    include "includes/add-post.php";
                                    break;
                                case "edit_post":
                                    include "includes/edit-post.php";
                                    break;
                                case "200":
                                    echo "200";
                                    break;
                                default:
                                    include "includes/view-all-posts.php";
                                    break;
                            }
                        ?>
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