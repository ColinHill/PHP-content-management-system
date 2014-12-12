<!DOCTYPE html>

<?php
session_start();

if(!isset($_SESSION['myusername'])){
    header("location:main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['author'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:main_login.php");
}
?>
<html>
<head>
    <title> </title>
</head>
<body>
<form action="index.php">
    <input type="submit" value="Return To Front End" />
</form>
<p>Manage Site Pages</p>

<table border = "1">
    <th>Page ID</th><th>Name</th><th>Alias</th><th>Description</th><th>Created By:</th><th>Creation Date:</th>
    <th>Modified By:</th><th>Modify Date:</th>

    <?php
    include_once("../DataAccess/dbConnect.php");
    $db = dbConnect::getReadOnly();

    $result = mysqli_query($db, "SELECT * FROM SitePages ORDER BY SitePages_ID ASC");

    while ($row = mysqli_fetch_assoc($result)):
        ?>

        <tr>
            <td><?php echo strip_tags($row['SitePages_ID']);?></td>
            <td><?php echo strip_tags($row['Name']);?></td>
            <td><?php echo strip_tags($row['Alias']);?></td>
            <td><?php echo strip_tags($row['Description']);?></td>
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

<form action="authorUpdatePages.php" method="post" name="updatePages" onsubmit="validateForm13()">
    <p>ID to Update:
        <input name="update" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Update Site Page">
    </p>
</form>
<form action="authorCreatePages.php" method="post" name="createPage">
    <p>
        <input name="submit" type="submit" value="Create New Site Page">
    </p>
</form>

</body>
</html>