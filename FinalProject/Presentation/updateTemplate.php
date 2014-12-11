<?php
session_start();

    include_once('../DataAccess/dbConnect.php');
    $db = dbConnect::getTemplateConnection();

if(!isset($_SESSION['myusername'])){
    header("location:main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:main_login.php");
}

    $CSSTemplates_ID = mysqli_real_escape_string($db, $_POST['update']);

    $query = "SELECT * FROM CSSTemplates WHERE CSSTemplates_ID = '$CSSTemplates_ID'";
    $result = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($result)):
            $name = strip_tags($row['Name']);
            $description = strip_tags($row['Description']);
            $csssnippet = strip_tags($row['CSSSnippet']);
?>
<html>
<head>
    <script src="validation.js"></script>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
    <title>Update Template:</title>
</head>

<body>

<form action="manageTemplates.php">
    <input type="submit" value="Return To Manage Templates" />
</form>

<form id="updateTemplate" method="post" onsubmit="return validateForm7()" action="../BusinessScripts/runUpdateTemplate.php">

    <p>Template ID:
        <input id="CSSTemplates_ID" name="CSSTemplates_ID" type="text" maxlength="255" value="<?php echo strip_tags($CSSTemplates_ID);?>" readonly="readonly" />

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value="<?php echo strip_tags($name);?>"/>

    <p>Description:
        <input id="Description" name="Description" type="text" maxlength="255" value="<?php echo strip_tags($description);?>"/>

    <p>CSS Snippet:</p>
        <p>
        <textarea form="updateTemplate" name="CSSSnippet"><?php echo strip_tags($csssnippet);?>
        </textarea>

    <p><input id="submit" type="submit" name="submit" value="Update Template" />
<?php endwhile; ?>
</body>
</html>