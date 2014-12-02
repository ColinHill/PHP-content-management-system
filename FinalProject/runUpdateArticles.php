<!DOCTYPE html>
<html>
<head>
    <h1>Article Updated:</h1>
</head>
<body>
<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();

$Article_ID = $_POST['Articles_ID'];
$name = $_POST['Name'];
$title = $_POST ['Title'];
$description = $_POST['Description'];
$htmlSnippet = $_POST['HTMLSnippet'];
$contentArea = $_POST['contentAreaDropDown'];
$allPages = $_POST['allPages'];
$page = $_POST['Page'];

$query = "UPDATE Articles SET Name = '$name', Description = '$description', Title = '$title', ContentArea = '$contentArea', ";
$query .= "AllPages = '$allPages', Page = '$page', HTMLSnippet = '$htmlSnippet' WHERE Articles_ID = '$Article_ID'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to Update Article record from CMS Database.');
}

?>

<p>Successfully Updated <?php echo mysqli_affected_rows($db); ?> records.</p>
<a href="manageArticles.php">Back to Manage Articles page</a>