<?php
include "db_conn.php"; // Include the database connection file

if(isset($_POST['submit'])){
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // SQL query to insert data into the table
    $sql = "INSERT INTO crud (name, email, mobile, password) VALUES ('$name', '$email', '$mobile', '$password')";
    
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close the database connection
    $conn->close(); 
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Signup Form</h2>
<form action="" method="POST">
  <fieldset>
    <legend>Personal information:</legend>
    Name:<br>
    <input type="text" name="name">
    <br>
    Email:<br>
    <input type="email" name="email">
    <br>
    Mobile:<br>
    <input type="text" name="mobile">
    <br>
    Password:<br>
    <input type="password" name="password">
    <br><br>
    <input type="submit" name="submit" value="Submit">
  </fieldset>
</form>
</body>
</html>
