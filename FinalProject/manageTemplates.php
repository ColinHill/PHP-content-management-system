<!DOCTYPE html>
<html>
<head>
    <title>     </title>
</head>
<body>
<p>Manage CSS Templates</p>

<table border = "1">
    <th>Template ID</th><th>Name</th><th>Description</th><th>Active Template</th><th></th>
    <th>Created By:</th><th>Creation Date:</th><th>Modified By:</th><th>Modify Date:</th>

    <?php
    include_once ("dbConnect.php");
    $db = dbConnect::getConnection();

    $result = mysqli_query($db, "SELECT * FROM CSSTemplates ORDER BY CSSTemplates_ID ASC");

    while ($row = mysqli_fetch_assoc($result)):
        $currentID = $row['CSSTemplates_ID'];
        $activeState = $row['ActiveState'];
        $isActive = false;
        if ($activeState == 1)
        {
            $isActive = true;
        }//end if
        ?>

        <tr>
            <td><?php echo $row['CSSTemplates_ID'];?></td>
            <td><?php echo $row['Name'];?></td>
            <td><?php echo $row['Description'];?></td>
            <td>
                <input type="radio" name="activeTemplate" disabled="disabled"
                <?php
                    if ($isActive == true)
                    {echo " checked />";}
                    else
                    {echo " />";}
                ?>
            </td>
            <td>
                <form action="makeTemplateActive.php"  method="post" name="makeTemplateActive">
                        <input name="id" type="hidden" value="<?php echo $currentID;?>" />
                    <p>
                        <input name="submit" type="submit" value="Activate" />
                    </p>
                </form>
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

<form action="deleteTemplate.php"  method="post" name="deactivateUser">
    <p>ID to Delete:
        <input name="id" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Delete Template">
    </p>
</form>
<form action="updateTemplate.php" method="post" name="updateTemplate">
    <p>ID to Update:
        <input name="update" type="text">
    </p>
    <p>
        <input name="submit" type="submit" value="Update Template">
    </p>
</form>
<form action="createTemplate.php" method="post" name="createTemplate">
    <p>
        <input name="submit" type="submit" value="Create New Template">
    </p>
</form>

</body>
</html>