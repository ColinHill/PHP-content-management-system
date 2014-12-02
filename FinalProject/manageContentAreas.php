<!DOCTYPE html>
<html>
<head>
    <title> </title>
</head>
<body>
<p>Manage Content Areas</p>

<table border = "1">
    <th>ContentArea ID</th><th>Name</th><th>Alias</th><th>Order</th><th>Description</th>
    <th>Created By:</th><th>Creation Date:</th><th>Modified By:</th><th>Modify Date:</th>

    <?php
    include_once ("dbConnect.php");
    $db = dbConnect::getConnection();

    $result = mysqli_query($db, "SELECT * FROM ContentAreas ORDER BY ContentAreas_ID ASC");

    while ($row = mysqli_fetch_assoc($result)):
        ?>

        <tr>
            <td><?php echo $row['ContentAreas_ID'];?></td>
            <td><?php echo $row['Name'];?></td>
            <td><?php echo $row['Alias'];?></td>
            <td><?php echo $row['Order'];?></td>
            <td><?php echo $row['Description'];?></td>
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

<form action="deleteContentArea.php"  method="post" name="deleteContentArea">
    <p>ID to Delete:
        <input name="delete" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Delete Content Area">
    </p>
</form>
<form action="updateContentArea.php" method="post" name="updateContentArea">
    <p>ID to Update:
        <input name="update" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Update Content Area">
    </p>
</form>
<form action="createContentArea.php" method="post" name="createContentArea">
    <p>
        <input name="submit" type="submit" value="Create New Content Area">
    </p>
</form>

</body>
</html>