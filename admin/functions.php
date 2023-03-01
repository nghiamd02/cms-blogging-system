<?php 
    function add_category(){
        global $conn;
        if(isset($_POST['add'])){
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
    }

    function show_all_categories(){
        global $conn;
        $categoriesQuery = "SELECT * FROM category";
        $result = mysqli_query($conn, $categoriesQuery); 
        while($row = mysqli_fetch_assoc($result)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<tr>
                    <td>$cat_id</td>
                    <td>$cat_title</td>
                    <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
                    <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>
                </tr>";
        }
    }

    function delete_category(){
        global $conn;
        if(isset($_GET['delete'])){
            $cat_id = $_GET['delete'];
            $deleteQuery = "DELETE FROM category WHERE cat_id = {$cat_id}";
            $delete = mysqli_query($conn, $deleteQuery);
            header("Location: categories.php");
        }
    }
?>