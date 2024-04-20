<?php 
$post_id = $_GET['post_id'];
$query = "SELECT * FROM posts WHERE post_id = $post_id";
$get_all_posts = mysqli_query($conn,$query);
if(!$get_all_posts){
    die("QUERY FAILED".mysqli_error($conn));
}
while ($result = mysqli_fetch_assoc($get_all_posts)) {
    $post_id = $result['post_id'];
    $post_title = $result['post_title'];
    $post_category_id =$result['post_category_id'];
    $post_author = $result['post_author'];
    $post_content = $result['post_content'];
    $post_date = $result['post_date'];
    $post_image = $result['post_image'];
    $post_tags = $result['post_tags'];
    $post_status = $result['post_status'];
?>
<h1>Update Post</h1>
<hr/>
<?php
}
if(isset($_POST["update_post"])){
    echo "This can be work";
    $post_title =  $_POST['title'];
    $post_author = $_POST['author'];
    $post_status = $_POST['status'];
    $post_category_id = $_POST['category'];                   
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];               
    $post_tags = $_POST['tags'];
    $post_content = $_POST['content'];

    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = $post_id";
        $select_posts = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($select_posts)){
            $post_image = $row['post_image'];
        }
    }
    move_uploaded_file($post_image_temp,"../images/$post_image");
    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = {$post_category_id}, ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .=" post_content = '{$post_content}', ";
    $query .=" post_image = '{$post_image}' ";
    $query .=" WHERE post_id = {$post_id} ";
    

    $update_post = mysqli_query($conn,$query);
    if(!$update_post){
            die("QUERY FAILED".mysqli_error($conn));
        }else{
            echo "<hpost_status2 style='color:green'>Post Updated successfully</h2>";
        }
}
?>
<form  action="" method="post"enctype="multipart/form-data" calss="container">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control"  name="title" value="<?php echo $post_title; ?>" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label for="category">Category</label><br>
        <select name="category" class="form-control">
         <?php 
         $cat_id = $post_category_id;
         $query = "SELECT * FROM categories /*WHERE cat_id = $cat_id*/";
         $result = mysqli_query($conn, $query);
         confirmQuery($result);
         while ($row = mysqli_fetch_assoc($result)){
            $cat_id = $row['cat_id'];            
            $cat_title = $row['cat_title'];
            if($cat_id===$post_category_id){
                echo"<option value='$cat_id' selected>$cat_title</option>" ;
            }else{
            echo"<option value='$cat_id'>$cat_title</option>" ;}}
             ?>
            
        </select>
        
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author" value="<?php echo $post_author; ?>" placeholder="Author Name">
    </div>
    <!--
    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" class="form-control" name="status" value="<?php echo $post_status; ?>" placeholder="Status">
    </div>
    -->
    <div class="form-group">
            <label for="status">Status</label><br>
            <select name="status" class="form-control">
                
                <?php
                if($post_status === "published"){
                    echo "<option value='published' selected> Published </option>";
                    echo "<option value='draft'> Drafted </option>";
                }else{
                    echo "<option value='draft' selected> Drafted </option>"; 
                    echo "<option value='published' > Published </option>";
                }
                
                ?>
            </select>  
        </div>
    <div class="form-group">
        <label for="image">Post Image</label><br>
        <img width="200px"src="../images/<?php echo $post_image;?>"/>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control"  rows="10" name="content"><?php echo $post_content; ?></textarea>
    </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="tags" value="<?php echo $post_tags; ?>" placeholder="Tags">
    </div>
    <button type="submit" class="btn btn-primary form-control" name="update_post">Update Post</button>
</form>
