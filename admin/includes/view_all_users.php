<h1 class="page-header">
    All Users
</h1>
<table class="table table-hover table-borderd">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">User Name</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Unapprove</th>
        <th scope="col">Make Admin</th>
        <th scope="col">Make Subscriber</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
<?php 
$query = "SELECT * FROM users";
$get_all_users = mysqli_query($conn,$query);
if(!$get_all_users){
    die("QUERY FAILED".mysqli_error($conn));
}
while ($result=mysqli_fetch_assoc($get_all_users)) {
    $user_id = $result['user_id'];
    $user_name = $result['user_name'];
    $user_password = $result['user_password'];
    $user_firstname = $result['user_firstname'];
    $user_lastname = $result['user_lastname'];
    $user_email = $result['user_email'];
    $user_role = $result['user_role'];
    
    echo "<tr>";
    echo "<td>$user_id</td>";
    echo "<td>$user_name</td>";
    echo "<td>$user_firstname</td>";
    echo "<td>$user_lastname</td>";
    echo "<td>$user_email</td>";
    echo "<td>$user_role</td>";
    echo "<td><a href='users.php?source=edit_user&user_id={$user_id}' class='btn btn-warning'>EDIT</a></td>";
    echo "<td><a class='btn btn-primary' href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
    echo "<td><a class='btn btn-primary' href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
    echo "<td><a class='btn btn-danger' href='users.php?delete={$user_id}'>Delete</a></td>";
    echo "</tr>";
}
?>
                                
    </tbody>
</table>

<?php 
if(isset($_GET['change_to_admin'])){
    $user_id = $_GET['change_to_admin'];
    $query = "UPDATE users SET `user_role` = 'admin' WHERE user_id = $user_id";
    $make_admin_query = mysqli_query($conn,$query);
    header("Location:users.php");
}
if(isset($_GET['change_to_subscriber'])){
    $user_id = $_GET['change_to_subscriber'];
    $query = "UPDATE users SET `user_role` = 'subscriber' WHERE user_id = $user_id";
    $make_subscriber_query = mysqli_query($conn,$query);
    header("Location:users.php");
}
?>
<?php 
if(isset($_GET['delete'])){
    $user_id = $_GET['delete'];
    $query = "DELETE  FROM users WHERE user_id = $user_id";
    $delete_query = mysqli_query($conn,$query);
    header("Location:users.php");
}
?>


                