<h1 class="page-header">
            All Posts
        </h1>
        <table class="table table-hover table-borderd">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Author</th>
                <th scope="col">Comment</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">In Response</th>
                <th scope="col">Date</th>
                <th scope="col">Approve</th>
                <th scope="col">Unapprove</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
<?php 
$query = "SELECT * FROM comments";
$get_all_comments = mysqli_query($conn,$query);
if(!$get_all_comments){
    die("QUERY FAILED".mysqli_error($conn));
}
while ($result=mysqli_fetch_assoc($get_all_comments)) {
    $comment_id = $result['comment_id'];
    $comment_post_id = $result['comment_post_id'];
    $comment_author = $result['comment_author'];
    $comment_content = $result['comment_content'];
    $comment_email = $result['comment_email'];
    $comment_status = $result['comment_status'];
    $comment_date = $result['comment_date'];
    echo "<tr>";
    echo "<td>$comment_id</td>";
    echo "<td>$comment_author</td>";
    echo "<td>$comment_content</td>";
    echo "<td>$comment_email</td>";
    echo "<td>$comment_status</td>";
    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
    $select_post_id_query = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($select_post_id_query)){
        $post_id = $row['post_id'];
        $post_title =  $row['post_title'];
        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
    }

    
    echo "<td>$comment_date</td>";
    echo "<td><a class='btn btn-primary' href='comments.php?approve={$comment_id}'>Approve</a></td>";
    echo "<td><a class='btn btn-primary' href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
    echo "<td><a class='btn btn-danger' href='comments.php?delete={$comment_id}'>Delete</a></td>";
    echo "</tr>";
}
?>
                                
            </tbody>
            </table>

<?php 
if(isset($_GET['unapprove'])){
    $comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET `comment_status` = 'unapproved' WHERE comment_id = $comment_id";
    $unapproved_comment_query = mysqli_query($conn,$query);
    header("Location:comments.php");
}
if(isset($_GET['approve'])){
    $comment_id = $_GET['approve'];
    $query = "UPDATE comments SET `comment_status` = 'approved' WHERE comment_id = $comment_id";
    $approved_comment_query = mysqli_query($conn,$query);
    header("Location:comments.php");
}
?>
<?php 
if(isset($_GET['delete'])){
    $post_id = $_GET['delete'];
    $query = "DELETE  FROM comments WHERE comment_id = $post_id";
    $delete_query = mysqli_query($conn,$query);
    header("Location:comments.php");
}
?>
    </div>
                