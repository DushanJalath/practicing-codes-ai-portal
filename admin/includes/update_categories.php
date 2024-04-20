<form action="" method="post">
    <div class="form-group">
        <label>Edit Category</label><br>
    <?php //EDIT QUERY
        if(isset($_GET['edit'])){
            $cat_id = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $cat_title = $row['cat_title'];?>
                <input type="text" name="cat_title" class="form-control"value="<?php if(isset($cat_title)){echo $cat_title;}?>">

    <?php
        }}
    ?> 
                                    
    </div>
    <div class="form-group">
        <input type="submit" name="update" value="Update Category" class="btn btn-primary form-control">
    </div>
</form>
                           
                            
<?php //UPDATE QUERY
if(isset($_POST['update'])){
                            
    $cat_title = $_POST['cat_title'];
    if($cat_title==""||empty($cat_title)){
        echo "<p style='color:red;'>Please enter a valid title for the new category.</p>";
    }else{
    $sql= "UPDATE `categories` SET cat_title='$cat_title' WHERE cat_id = $cat_id";
    $result = mysqli_query($conn, $sql) or die('Error updating data'.mysqli_error($conn));
    header("Location: categories.php");
}}
?>   