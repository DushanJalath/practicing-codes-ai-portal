
        <h1 class="page-header">
            Create a user
        </h1>
    <?php 
    if(isset($_POST['create_user'])){
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];                
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
                        
        

        move_uploaded_file($user_image_temp,"../images/$user_image");
        $query ="INSERT INTO users(user_name,user_password,user_firstname,user_lastname,user_email,user_image,user_role) ";
        $query .= "VALUES('{$user_name}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_image}','{$user_role}')";
        $create_user_query = mysqli_query($conn,$query);
        if(!$create_user_query){
            die("QUERY FAILED".mysqli_error($conn));
        }else{
            echo "<p style='color:green'>User created: "."<a href='users.php'>View Users</a></h2>";
        }
    }
    ?>
        <form class="form container" action="" method="post"enctype="multipart/form-data">
        <div class="form-group">
            <label for="user_name">User Name</label>
            <input type="text" class="form-control" name="user_name" placeholder="User Name">
        </div>
        <div class="form-group">
            <label for="user_password">Password</label>
            <input type="password" class="form-control" name="user_password" >
        </div>
        <div class="form-group">
            <label for="user_firstname">First Name</label>
            <input type="text" class="form-control" name="user_firstname" placeholder="First Name">
        </div>
        <div class="form-group">
            <label for="user_lastname">Last Name</label>
            <input type="text" class="form-control" name="user_lastname" placeholder="Last Name">
        </div>
        <div class="form-group">
            <label for="user_email">User Email</label>
            <input type="email" class="form-control" name="user_email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="user_image">User Image</label>
            <input type="file" class="form-control" name="user_image">
        </div>
        <div class="form-group">
            <label for="user_role">User Role</label><br>
            <select name="user_role" class="form-control">
                <option value='admin'>Admin</option>
                <option value='subscriber'>Subscriber</option>
            </select>  
        </div>

        <button type="submit" class="btn btn-primary form-control" name="create_user">Create User</button>
        </form>
    </div>    


