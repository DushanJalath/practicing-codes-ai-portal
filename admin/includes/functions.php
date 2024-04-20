<?php

function insertCategories(){
    global $conn;
    if(isset($_POST['add'])){
        $cat_title = $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title)){
            echo "<p style='color:red;'>Please enter a valid title for the new category.</p>";
        }else{
        $query = "INSERT INTO categories(`cat_title`) VALUES ('$cat_title')";
        $add_categories = mysqli_query($conn,$query);
        if(!$add_categories){
            die("QUERY FAILED".mysqli_error($conn));
        }
        }
    }
}

function getALLCategories(){
    global $conn;
    $query = "SELECT * FROM categories";
    $get_all_categories_query = mysqli_query($conn,$query);
    if(!$get_all_categories_query){
        die("QUERY FAILED".mysqli_error($conn));
    }
    while($row = mysqli_fetch_assoc($get_all_categories_query)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
    
        echo "<tr>";
        echo "<td>$cat_id</td>";
        echo "<td>$cat_title</td>";
        echo "<td><a href='categories.php?edit=$cat_id' class='btn btn-warning'>EDIT</a></td>";
        echo "<td><a href='categories.php?delete=$cat_id' class='btn btn-danger'>DELETE</a></td>";
        echo "</tr>";
 } 
}

function deleteCategories(){
    global $conn;
    //DELETE QUERY
    if(isset($_GET['delete'])){
    
        $cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$cat_id}";
        $delete_query = mysqli_query($conn,$query);
        header("Location: categories.php");
}}

function confirmQuery($result){
    if(!$result){
        die("QUERY FAILED".mysqli_error($result));
    }
}
?>