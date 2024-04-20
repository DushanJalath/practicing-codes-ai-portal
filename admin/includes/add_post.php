
        <h1 class="page-header">
            Create a post
        </h1>
    <?php 
    if(isset($_POST['create_post'])){
        $post_title =  $_POST['title'];
        $post_author = $_POST['author'];
        $post_status = $_POST['status'];
        $post_category = $_POST['category'];
                        
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
                        
        $post_tags = $_POST['tags'];
        $post_content = $_POST['content'];
        $post_date = date('d-m-y');
        $post_comment_count = 4;

        move_uploaded_file($post_image_temp,"../images/$post_image");
        $query ="INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status) VALUES({$post_category},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}')";
        $create_post_query = mysqli_query($conn,$query);
        if(!$create_post_query){
            die("QUERY FAILED".mysqli_error($conn));
        }else{
            echo "<h2 style='color:green'>Post created successfully</h2>";
        }
    }
    ?>
        <form class="form container" action="" method="post"enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control"  name="title" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label for="category">Category</label><br>
            <select name="category" class="form-control">
            <?php 
            
            $query = "SELECT * FROM categories";
            $result = mysqli_query($conn, $query);
            confirmQuery($result);
            while ($row = mysqli_fetch_assoc($result)){
                $cat_id = $row['cat_id'];            
                $cat_title = $row['cat_title'];
                
                echo"<option value='$cat_id'>$cat_title</option>" ;}
                ?>
                
            </select>  
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" placeholder="Author Name">
        </div>
        <div class="form-group">
            <label for="status">Post Status</label>
            <input type="text" class="form-control" name="status" placeholder="Status">
        </div>
        <div class="form-group">
            <label for="image">Post Image</label>
            <input type="file" class="form-control" name="image">
            
        </div>
        
        <div class="form-group">
            <label for="summernote">Content</label>
            <textarea id="summernote" class="form-control"  rows="10" name="content"></textarea>
        </div>
        <div class="form-group">
            <label for="tags">Post Tags</label>
            <input type="text" class="form-control" name="tags" placeholder="Tags">
        </div>
         
        <button type="submit" class="btn btn-primary form-control" name="create_post">Create Post</button>
        </form>
    </div>    


