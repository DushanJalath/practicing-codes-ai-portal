<?php 
$user_id = $_GET['user_id'];
$query = "SELECT * FROM users WHERE user_id = $user_id";
$get_user = mysqli_query($conn,$query);
if(!$get_user){
    die("QUERY FAILED".mysqli_error($conn));
}
while ($result = mysqli_fetch_assoc($get_user)) {
    
    $user_name = $result['user_name'];
    $user_password = $result['user_password'];
    $user_firstname = $result['user_firstname'];
    $user_lastname = $result['user_lastname'];
    $user_email = $result['user_email'];
    $user_role = $result['user_role'];                
    $user_image = $result['user_image'];

?>
<h1>Update User</h1>
<hr/>
<?php
}
if(isset($_POST["edit_user"])){
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];                
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    if(empty($user_image)){
        $query = "SELECT * FROM users WHERE user_id = $user_id";
        $select_user = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($select_user)){
            $user_image = $row['user_image'];
        }
    }
    move_uploaded_file($user_image_temp,"../images/$user_image");
    $query = "UPDATE users SET ";
    $query .= "`user_name` = '{$user_name}', ";
    $query .= "`user_password` = '{$user_password}', ";
    $query .= "`user_firstname` = '{$user_firstname}', ";
    $query .= "`user_lastname` = '{$user_lastname}', ";
    $query .= "`user_email` = '{$user_email}', ";
    $query .= "`user_role` = '{$user_role}', ";
    $query .= "`user_image` = '{$user_image}' ";
    $query .="WHERE `user_id` = {$user_id} ";
    $update_user = mysqli_query($conn,$query);
    if(!$update_user){
        die("QUERY FAILED".mysqli_error($conn));
    }else{
        echo "<h2 style='color:green'>User Updated successfully</h2>";
    }
}
?>
<form class="form container" action="" method="post"enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_name">User Name</label>
        <input type="text" class="form-control" name="user_name" placeholder="User Name" value="<?php echo $user_name;?>">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password;?>">
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname" placeholder="First Name" value="<?php echo $user_firstname;?>">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" placeholder="Last Name" value="<?php echo $user_lastname;?>">
    </div>
    <div class="form-group">
        <label for="user_email">User Email</label>
        <input type="email" class="form-control" name="user_email" placeholder="Email" value="<?php echo $user_email;?>">
    </div>
    <div class="form-group">
        <label for="user_image">User Image</label>
        <img height="200px"src="../images/<?php echo $user_image;?>"/>
        <input type="file" class="form-control" name="user_image">
    </div>
    <div class="form-group">
        <label for="user_role">User Role</label><br>
        
        <select name='user_role' class="form-control">
        <?php
            if($user_role == 'admin'){
                echo '<option selected value="admin"> Admin </option>';
                echo'<option value="subscriber" > Subscriber </option>' ;
            }elseif($user_role == 'subscriber'){
                echo '<option value="admin"> Admin </option>';
                echo'<option selected value="subscriber"> Subscriber </option>' ;                
            }
        ?>
        </select>

    </div>
    <button type="submit" class="btn btn-primary form-control" name="edit_user">Update User</button>
</form>