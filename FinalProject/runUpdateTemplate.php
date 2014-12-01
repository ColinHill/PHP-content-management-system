<!DOCTYPE html>
<html>
<head>
    <h1>Template Updated:</h1>
</head>
<body>
<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();

$CSSTemplates_ID = $_POST['CSSTemplates_ID'];
$name = $_POST['Name'];
$description = $_POST['Description'];
$csssnippet = $_POST['CSSSnippet'];


$query = "UPDATE CSSTemplates SET Name = '$name', Description = '$description', ";
$query .= "CSSSnippet = '$csssnippet' WHERE CSSTemplates_ID = '$CSSTemplates_ID'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to Update CSS Template record from CMS Database.');
}

?>

<p>Successfully Updated <?php echo mysqli_affected_rows($db); ?> records(s).</p>
<a href="manageTemplates.php">Back to Manage CSS Templates page</a>