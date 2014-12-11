<!DOCTYPE html>
<?php

session_start();

if(!isset($_SESSION['myusername'])){
header("location:main_login.php");
}
if($_SESSION['admin'] == 0 && $_SESSION['allaccess'] == 0){
header("location:main_login.php");
}
?>

<html>
<head>
    <title>     </title>
</head>
<body>
<form action="admin.php">
    <input type="submit" value="Return To Admin" />
</form>
<p>Manage Users</p>

<table border = "1">
    <th>User ID</th><th>First Name</th><th>Last Name</th><th>Username</th>
    <th>Created By:</th><th>Creation Date:</th><th>Modified By:</th><th>Modify Date:</th>

    <?php
    include_once("../DataAccess/dbConnect.php");
    $db = dbConnect::getReadOnly();

    $result = mysqli_query($db, "SELECT * FROM Users ORDER BY User_ID ASC");

    while ($row = mysqli_fetch_assoc($result)):
        ?>

        <tr>
            <td><?php echo strip_tags($row['User_ID']);?></td>
            <td><?php echo strip_tags($row['first_name']);?></td>
            <td><?php echo strip_tags($row['last_name']);?></td>
            <td><?php echo strip_tags($row['user_name']);?></td>
            <td><?php echo strip_tags($row['CreatedBy']);?></td>
            <td><?php echo strip_tags($row['CreationDate']);?></td>
            <td><?php echo strip_tags($row['ModifyBy']);?></td>
            <td><?php echo strip_tags($row['ModifyDate']);?></td>
        </tr>

    <?php
    endwhile;

    mysqli_close($db);

    ?>
</table>

<form action="../DataAccess/deactivateUser.php"  method="post" name="deactivateUser">
    <p>ID to Deactivate:
        <input name="deactivate" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Deactivate User">
    </p>
</form>
<form action="updateUser.php" method="post" name="updateUser" onsubmit="validateForm11()">
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