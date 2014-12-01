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
    <title>Update Template:</title>
</head>

<body>

<form id="updateTemplate" method="post" action="runUpdateTemplate.php">

    <p>Template ID:
        <input id="CSSTemplates_ID" name="CSSTemplates_ID" type="text" maxlength="255" value="<?php echo $CSSTemplates_ID;?>" readonly="readonly" />

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value="<?php echo $name;?>"/>

    <p>Description:
        <input id="Description" name="Description" type="text" maxlength="255" value="<?php echo $description;?>"/>

    <p>CSS Snippet:</p><p>
        <input id="CSSSnippet" name="CSSSnippet" type="text" maxlength="10000" cols="100" rows="20" wrap="soft" value="<?php echo $csssnippet;?>"/>

    <p><input id=" " type="submit" name="submit" value="Update Template" />
<?php endwhile; ?>
</body>
</html>

<!--<textarea name="CSSSnippet" cols="100" rows="20" maxlength="10000" wrap="soft" value="<?php //echo $csssnippet;?>"></textarea>-->