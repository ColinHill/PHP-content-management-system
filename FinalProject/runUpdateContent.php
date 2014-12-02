<!DOCTYPE html>
<html>
<head>
    <h1>Content Area Updated:</h1>
</head>
<body>
<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();

$contentid = $_POST['ContentAreas_ID'];
$name = $_POST['Name'];
$alias = $_POST['Alias'];
$order = $_POST['Order'];
$description = $_POST['Description'];

$query = "UPDATE ContentAreas SET Name = '$name', Description = '$description', ";
$query .= "Alias = '$alias', Order = '$order' WHERE ContentAreas_ID = '$contentid'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to Update Content Area record from CMS Database.');
}

?>

<p>Successfully Updated <?php echo mysqli_affected_rows($db); ?> record.</p>
<a href="manageContentAreas.php">Back to Manage Content Areas page</a>