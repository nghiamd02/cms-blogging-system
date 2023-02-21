    <?php include "includes/header.php"?>
    
<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php 
                    if (isset($_POST['submit'])) {
                        $keyword = $_POST['text'];
                        $myQuery = "SELECT * FROM posts WHERE post_tags LIKE '%$keyword%'";
                        $result = mysqli_query($conn, $myQuery);
                        if(mysqli_num_rows($result) != 0){
                            While($row = mysqli_fetch_assoc($result)){
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];    
                                $post_date = $row['post_date'];
                                $post_content = $row['post_content'];
                                $post_image = $row['post_image'];
                            ?>
                        
                <h2>
                    <a href="#"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date?></p>
                <hr>
                <img class="img-responsive" src="imgs/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo $post_content?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <?php 
                        };
                    }else{
                        echo "<h1>NO RESULT</h1>";
                    }
                }
                ?>
                <hr>

                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

            </div>

        <?php include "includes/sidebar.php"?>

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php"?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
