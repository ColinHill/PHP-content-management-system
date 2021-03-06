<!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION['myusername'])){
    header("location:main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:main_login.php");
}
?>
<html>
<head>
    <title> </title>
</head>
<body>
<form action="admin.php">
    <input type="submit" value="Return To Admin" />
</form>
<p>Manage Content Areas</p>

<table border = "1">
    <th>ContentArea ID</th><th>Name</th><th>Alias</th><th>Order</th><th>Description</th>
    <th>Created By:</th><th>Creation Date:</th><th>Modified By:</th><th>Modify Date:</th>

    <?php
    include_once("../DataAccess/dbConnect.php");
    $db = dbConnect::getReadOnly();

    $result = mysqli_query($db, "SELECT * FROM ContentAreas ORDER BY ContentAreas_ID ASC");

    while ($row = mysqli_fetch_assoc($result)):
        ?>

        <tr>
            <td><?php echo strip_tags($row['ContentAreas_ID']);?></td>
            <td><?php echo strip_tags($row['Name']);?></td>
            <td><?php echo strip_tags($row['Alias']);?></td>
            <td><?php echo strip_tags($row['Order']);?></td>
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

<form action="../DataAccess/deleteContentArea.php"  method="post" name="deleteContentArea">
    <p>ID to Delete:
        <input name="delete" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Delete Content Area">
    </p>
</form>
<form action="updateContentArea.php" method="post" name="updateContentArea" onsubmit="validateForm14()">
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