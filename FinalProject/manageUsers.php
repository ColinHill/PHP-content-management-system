<!DOCTYPE html>
<html>
<head>
    <title>     </title>
</head>
<body>
<p>Manage Users</p>

<table border = "1">
    <th>User ID</th><th>First Name</th><th>Last Name</th><th>Username</th
    <th>Created By:</th><th>Creation Date:</th><th>Modified By:</th><th>Modify Date:</th>

    <?php

    require_once('dbConnect.php');
    $db = getConnection();

    $result = mysqli_query($db, "SELECT * FROM Users ORDER BY User_ID DESC");

    while ($row = mysqli_fetch_assoc($result)):
        ?>

        <tr>
            <td><?php echo $row['User_ID'];?></td>
            <td><?php echo $row['first_name'];?></td>
            <td><?php echo $row['last_name'];?></td>
            <td><?php echo $row['ModifyBy'];?></td>
            <td><?php echo $row['ModifyDate'];?></td>
            <td><?php echo $row['CreatedBy'];?></td>
            <td><?php echo $row['CreationDate'];?></td>
        </tr>

    <?php
    endwhile;

    mysqli_close($db);

    ?>
</table>

<form action="delete.php"  method="post" name="DeleteActor">
    <p>ID to Delete:
        <input name="id" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Delete Actor">
    </p>
</form>
<form action="update.php" method="post" name="UpdateActor">
    <p>ID to Update:
        <input name="update" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Update Actor">
    </p>
</form>

</body>
</html>