<?php
include "db_conn.php";

if (isset($_POST['update'])) {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to update user data
    $sql = "UPDATE `crud` SET `name`='$firstname', `email`='$email', `password`='$password' WHERE `id`='$user_id'";

    // Execute the SQL query
    $result = $conn->query($sql);
    
    // Check if the query was successful
    if ($result === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    // Retrieve user ID from the URL
    $user_id = $_GET['id'];
    
    // SQL query to retrieve user data
    $sql = "SELECT * FROM `crud` WHERE `id`='$user_id'";
    
    // Execute the SQL query
    $result = $conn->query($sql);
    
    // Check if user data exists
    if ($result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();
        
        // Extract user data
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];

        // Display update form
?>
        <h2>User Update Form</h2>
        <form action="" method="post">
            <fieldset>
                <legend>Personal information:</legend>
                Name:<br>
                <input type="text" name="firstname" value="<?php echo $name; ?>"><br>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"><br>
                Email:<br>
                <input type="email" name="email" value="<?php echo $email; ?>"><br>
                Password:<br>
                <input type="password" name="password" value="<?php echo $password; ?>"><br>
                <input type="submit" value="Update" name="update">
            </fieldset>
        </form>
<?php
    } else {
        // Redirect to view page if user data not found
        header('Location: view.php');
    }
}
?>
