<?php
include "db_conn.php"; // Including the database connection file

$sql = "SELECT * FROM crud"; // Assuming your table name is "crud"

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td>
                            <a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;
                            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>                       
                <?php
                    }
                }
                else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
                ?>                
            </tbody>
        </table>
    </div> 
</body>
</html>
