<!DOCTYPE html>

<?php
if(!isset($_SESSION['editor'])){
header("location:../Presentation/main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['author'] == 0 && $_SESSION['allaccess'] == 0){
header("location:../Presentation/main_login.php");
}
?>

<html>
<head>
    <h1>Site Page Created:</h1>
</head>
<body>
<?php
include_once("../DataAccess/dbConnect.php");
$db = dbConnect::getPagesConnection();

$name = mysqli_real_escape_string($db, $_POST['Name']);
$alias = mysqli_real_escape_string($db, $_POST['Alias']);
$description = mysqli_real_escape_string($db, $_POST['Description']);

$query = "INSERT INTO SitePages (Name, Alias, Description, CreatedBy) ";
$query .= "VALUES ('$name', '$algetConnectionias', '$description', 1)";

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



<?php
if ($_SESSION['Author' == 1]){
    ?>

    <a href="../Presentation/authorManagePages.php">Back to Manage Site Pages page</a>
<?php
}
else{
    ?>
    <a href="../Presentation/authorManagePages.php">Back to Manage Site Pages page</a>

<?php
}
?>


</body>
</html>