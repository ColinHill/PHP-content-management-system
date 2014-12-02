<!DOCTYPE html>
<html>
<head>
    <h1>Site Page Created:</h1>
</head>
<body>
<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();

$name = $_POST['Name'];
$alias = $_POST['Alias'];
$description = $_POST['Description'];

$query = "INSERT INTO SitePages (Name, Alias, Description, CreatedBy) ";
$query .= "VALUES ('$name', '$alias', '$description', 1)";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to insert Site Page into CMS Database.');
}

?>

<p>Successfully Inserted <?php echo mysqli_affected_rows($db); ?> record.</p>
<?php
dbConnect::closeConnection($db);
?>

<a href="managePages.php">Back to Manage Site Pages page</a>
</body>
</html>