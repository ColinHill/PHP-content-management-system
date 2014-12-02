<!DOCTYPE html>
<html>
<head>
    <title> </title>
</head>
<body>
<form action="admin.php">
    <input type="submit" value="Return To Admin" />
</form>
<p>Manage Articles</p>

<table border = "1">
    <th>Article ID</th><th>Name</th><th>Title</th><th>Description</th><th>Page</th><th>Content Area</th><th>All Pages</th>
    <th>Created By:</th><th>Creation Date:</th><th>Modified By:</th><th>Modify Date:</th>

    <?php
    include_once ("dbConnect.php");
    $db = dbConnect::getConnection();

    $result = mysqli_query($db, "SELECT * FROM Articles ORDER BY Articles_ID ASC");

    while ($row = mysqli_fetch_assoc($result)):
        $currentID = $row['Articles_ID'];
        $allPages = $row['AllPages'];
        $isAllPages = false;
        if ($allPages == 1)
        {
            $isAllPages = true;
        }//end if
        ?>

        <tr>
            <td><?php echo $row['Articles_ID'];?></td>
            <td><?php echo $row['Name'];?></td>
            <td><?php echo $row['Title'];?></td>
            <td><?php echo $row['Description'];?></td>
            <td><?php echo $row['Page'];?></td>
            <td><?php echo $row['ContentArea'];?></td>
            <td>
                <input type="checkbox" name="allPages" disabled="disabled"
                <?php
                if ($isAllPages == true)
                {echo " checked />";}
                else
                {echo " />";}
                ?>
            </td>
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

<form action="deleteArticles.php"  method="post" name="deleteArticles">
    <p>ID to Delete:
        <input name="delete" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Delete Article">
    </p>
</form>
<form action="updateArticles.php" method="post" name="updateArticles">
    <p>ID to Update:
        <input name="update" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Update Article">
    </p>
</form>
<form action="createArticles.php" method="post" name="createArticles">
    <p>
        <input name="submit" type="submit" value="Create New Article">
    </p>
</form>

</body>
</html>