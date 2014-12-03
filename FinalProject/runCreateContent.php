<!DOCTYPE html>
<html>
<head>
    <h1>Content Area Created:</h1>
</head>
<body>
<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();

$name = $_POST['Name'];
$alias = $_POST['Alias'];
$order = $_POST['Order'];
$description = $_POST['Description'];

$query = "INSERT INTO ContentAreas (Name, Alias, ContentAreas.Order, Description, CreatedBy) ";
$query .= "VALUES ('$name', '$alias', '$order', '$description', 1)";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to insert Content Area into CMS Database.');
}

?>

<p>Successfully Inserted <?php echo mysqli_affected_rows($db); ?> record.</p>
<?php
dbConnect::closeConnection($db);
?>

<a href="manageContentAreas.php">Back to Manage Content Areas page</a>
</body>
</html>