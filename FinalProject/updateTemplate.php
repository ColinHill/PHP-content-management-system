<?php
    include_once ('dbConnect.php');
    $db = dbConnect::getConnection();
    $CSSTemplates_ID = $_POST['update'];

    $query = "SELECT * FROM CSSTemplates WHERE CSSTemplates_ID = '$CSSTemplates_ID'";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)):
            $name = $row['Name'];
            $description = $row['Description'];
            $csssnippet = $row['CSSSnippet'];
?>
<html>
<head>
    <script src="validation.js"></script>
    <title>Update Template:</title>
</head>

<body>

<form action="manageTemplates.php">
    <input type="submit" value="Return To Manage Templates" />
</form>

<form id="updateTemplate" method="post" onsubmit="return validateForm7()" action="runUpdateTemplate.php">

    <p>Template ID:
        <input id="CSSTemplates_ID" name="CSSTemplates_ID" type="text" maxlength="255" value="<?php echo $CSSTemplates_ID;?>" readonly="readonly" />

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value="<?php echo $name;?>"/>

    <p>Description:
        <input id="Description" name="Description" type="text" maxlength="255" value="<?php echo $description;?>"/>

    <p>CSS Snippet:</p>
        <p>
        <textarea form="updateTemplate" name="CSSSnippet" cols="100" rows="20" maxlength="10000" wrap="soft" value=""><?php echo $csssnippet;?>
        </textarea>

    <p><input id="submit" type="submit" name="submit" value="Update Template" />
<?php endwhile; ?>
</body>
</html>