<?php include "db.php"; ?>
<?php session_start(); ?>
<?php

if(isset($_POST['login'])){
$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($conn,$username);
$password = mysqli_real_escape_string($conn,$password);

$query = "SELECT * FROM users WHERE user_name ='{$username}'";
$select_user_query = mysqli_query($conn,$query);
if(!$select_user_query){
    die("QUERY FAILED".mysqli_error($conn));
}
while($row = mysqli_fetch_array($select_user_query)){
    $db_user_id = $row['user_id'];
    $db_username = $row['user_name'];
    $db_user_password = $row['user_password'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
}
if($username === $db_username && $password === $db_user_password){
    $_SESSION['username'] = $db_username;
    $_SESSION['firstname'] = $db_user_firstname;
    $_SESSION['lastname'] = $db_user_lastname;
    $_SESSION['user_role'] = $db_user_role;
    header("Location: ../admin/index.php");
    
} else {
    header("Location: ../index.php");
}

}

?>