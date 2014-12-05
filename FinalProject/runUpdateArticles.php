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
$contentArea = $_POST['updateArticle'];
$allPages = $_POST['allPages'];
$page = $_POST['Page'];
if ($page == "")
{
    $page = 50;
}
if(empty ($allPages))
{
    $allPages = 0;
}
else
{
    $allPages = 1;
}

if ($page == 50)
{
    $query = "UPDATE Articles SET Name = '$name', Description = '$description', Title = '$title', ContentArea = '$contentArea', ";
    $query .= "AllPages = '$allPages', Page = NULL, HTMLSnippet = '$htmlSnippet' WHERE Articles_ID = '$Article_ID'";
}
else
{
$query = "UPDATE Articles SET Name = '$name', Description = '$description', Title = '$title', ContentArea = '$contentArea', ";
$query .= "AllPages = '$allPages', Page = '$page', HTMLSnippet = '$htmlSnippet' WHERE Articles_ID = '$Article_ID'";
}

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to Update Article record from CMS Database.');
}

?>

<p>Successfully Updated <?php echo mysqli_affected_rows($db); ?> records.</p>
<a href="manageArticles.php">Back to Manage Articles page</a>