<!DOCTYPE html>
<?php
if(!isset($_SESSION['editor'])){
    header("location:../Presentation/main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:../Presentation/main_login.php");
}
?>
<html>
<head>
    <h1>Content Area Created:</h1>
</head>
<body>
<?php
include_once("../DataAccess/dbConnect.php");
$db = dbConnect::getContentAreaConnection();

$name = mysqli_real_escape_string($db, $_POST['Name']);
$alias = mysqli_real_escape_string($db, $_POST['Alias']);
$order = mysqli_real_escape_string($db, $_POST['Order']);
$description = mysqli_real_escape_string($db, $_POST['Description']);

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

<a href="../Presentation/manageContentAreas.php">Back to Manage Content Areas page</a>
</body>
</html>