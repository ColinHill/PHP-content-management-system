<!DOCTYPE html>
<html>
<head>
    <title>     </title>
</head>
<body>
<p>Manage Users</p>

<table border = "1">
    <th>User ID</th><th>First Name</th><th>Last Name</th><th>Username</th>
    <th>Created By:</th><th>Creation Date:</th><th>Modified By:</th><th>Modify Date:</th>

    <?php
    include_once ("dbConnect.php");
    $db = dbConnect::getConnection();

    $result = mysqli_query($db, "SELECT * FROM Users ORDER BY User_ID ASC");

    while ($row = mysqli_fetch_assoc($result)):
        ?>

        <tr>
            <td><?php echo $row['User_ID'];?></td>
            <td><?php echo $row['first_name'];?></td>
            <td><?php echo $row['last_name'];?></td>
            <td><?php echo $row['user_name'];?></td>
            <td><?php echo $row['CreatedBy'];?></td>
            <td><?php echo $row['CreationDate'];?></td>
            <td><?php echo $row['ModifyBy'];?></td>
            <td><?php echo $row['ModifyDate'];?></td>
        </tr>

    <?php
    endwhile;

    mysqli_close($db);

    ?>
</table>

<form action="deactivateUser.php"  method="post" name="deactivateUser">
    <p>ID to Deactivate:
        <input name="deactivate" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Deactivate User">
    </p>
</form>
<form action="updateUser.php" method="post" name="updateUser">
    <p>ID to Update:
        <input name="update" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Update User">
    </p>
</form>
<form action="createUser.php" method="post" name="createUser">
    <p>
        <input name="submit" type="submit" value="Create New User">
    </p>
</form>

</body>
</html>