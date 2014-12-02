<!DOCTYPE html>
<html>
<head>
    <h1>Site Page Updated:</h1>
</head>
<body>
<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();

$siteid = $_POST['SitePages_ID'];
$name = $_POST['Name'];
$alias = $_POST['Alias'];
$description = $_POST['Description'];


$query = "UPDATE SitePages SET Name = '$name', Description = '$description', ";
$query .= "Alias = '$alias' WHERE SitePages_ID = '$siteid'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to Update Site Page record from CMS Database.');
}

?>

<p>Successfully Updated <?php echo mysqli_affected_rows($db); ?> records.</p>
<a href="managePages.php">Back to Manage Site Pages page</a>