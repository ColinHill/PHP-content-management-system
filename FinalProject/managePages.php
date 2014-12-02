<!DOCTYPE html>
<html>
<head>
    <title> </title>
</head>
<body>
<form action="admin.php">
    <input type="submit" value="Return To Admin" />
</form>
<p>Manage Site Pages</p>

<table border = "1">
    <th>Page ID</th><th>Name</th><th>Alias</th><th>Description</th><th>Created By:</th><th>Creation Date:</th>
    <th>Modified By:</th><th>Modify Date:</th>

    <?php
    include_once ("dbConnect.php");
    $db = dbConnect::getConnection();

    $result = mysqli_query($db, "SELECT * FROM SitePages ORDER BY SitePages_ID ASC");

    while ($row = mysqli_fetch_assoc($result)):
        ?>

        <tr>
            <td><?php echo $row['SitePages_ID'];?></td>
            <td><?php echo $row['Name'];?></td>
            <td><?php echo $row['Alias'];?></td>
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

<form action="deletePages.php"  method="post" name="deletePages">
    <p>ID to Delete:
        <input name="delete" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Delete Site Page">
    </p>
</form>
<form action="updatePages.php" method="post" name="updatePages">
    <p>ID to Update:
        <input name="update" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Update Site Page">
    </p>
</form>
<form action="createPages.php" method="post" name="createPage">
    <p>
        <input name="submit" type="submit" value="Create New Site Page">
    </p>
</form>

</body>
</html>