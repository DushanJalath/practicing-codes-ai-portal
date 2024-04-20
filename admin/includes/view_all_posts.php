<h1 class="page-header">
            All Posts
        </h1>
        <table class="table table-hover table-borderd">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Author</th>
                <th scope="col">Date</th>
                <th scope="col">Image</th>
                <th scope="col">Tags</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
<?php 
$query = "SELECT * FROM posts";
$get_all_posts = mysqli_query($conn,$query);
if(!$get_all_posts){
    die("QUERY FAILED".mysqli_error($conn));
}
while ($result=mysqli_fetch_assoc($get_all_posts)) {
    $post_id = $result['post_id'];
    $post_title = $result['post_title'];
    $post_category_id =$result['post_category_id'];
    $post_author = $result['post_author'];
    $post_date = $result['post_date'];
    $post_image = $result['post_image'];
    $post_tags = $result['post_tags'];
    $post_status = $result['post_status'];
    echo "<tr>";
    echo "<td>$post_id</td>";
    echo "<td>$post_title</td>";
    $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
    $select_cat = mysqli_query($conn, $query);
    while($row =mysqli_fetch_assoc($select_cat)){
        $cat_title = $row['cat_title'];
        echo "<td>$cat_title</td>";
    } 


    
    echo "<td>$post_author</td>";
    echo "<td>$post_date</td>";
    echo "<td><img src='../images/$post_image' width='100px'/></td>";
    echo "<td>$post_tags</td>";
    echo "<td>$post_status</td>";
    echo "<td><a href='posts.php?source=edit_post&post_id={$post_id}' class='btn btn-warning'>EDIT</a></td>";
    echo "<td><a href='posts.php?delete={$post_id}' class='btn btn-danger'>DELETE</a></td>";
    echo "<td><a href='posts.php?publish={$post_id}' class='btn btn-primary'>Publish</a></td>";
    echo "<td><a href='posts.php?draft={$post_id}' class='btn btn-primary'>Draft</a></td>";

    echo "</tr>";
}
?>
                                
            </tbody>
            </table>
<?php 
if(isset($_GET['delete'])){
    $post_id = $_GET['delete'];
    $query = "DELETE  FROM posts WHERE post_id = $post_id";
    $delete_query = mysqli_query($conn,$query);
    header("Location:posts.php");
}
if(isset($_GET['publish'])){
    $post_id = $_GET['publish'];
    $query ="UPDATE posts SET post_status ='published'WHERE post_id=$post_id";
    $update_status = mysqli_query($conn,$query) ;
    header("Location:posts.php");
}
if(isset($_GET['draft'])){
    $post_id = $_GET['draft'];
    $query ="UPDATE posts SET post_status ='draft' WHERE post_id=$post_id";
    $update_status = mysqli_query($conn,$query) ;
    header("Location:posts.php");
}
?>
    </div>
                