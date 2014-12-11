<!DOCTYPE html>

<?php
session_start();

if(!isset($_SESSION['myusername'])){
    header("location:../Presentation/main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:../Presentation/main_login.php");
}
?>
<html>
<head>
    <h1>Content Area Updated:</h1>
</head>
<body>
<?php
include_once("../DataAccess/dbConnect.php");
$db = dbConnect::getContentAreaConnection();

$contentid = mysqli_real_escape_string($db, $_POST['ContentAreas_ID']);
$name = mysqli_real_escape_string($db, $_POST['Name']);
$alias = mysqli_real_escape_string($db, $_POST['Alias']);
$order = mysqli_real_escape_string($db, $_POST['Order']);
$description = mysqli_real_escape_string($db, $_POST['Description']);
$modifyby = $_SESSION['myusername'];

$query = "SELECT User_ID FROM Users WHERE user_name = '$modifyby'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$modifyid = $row['User_ID'];

$query = "UPDATE ContentAreas SET Name = '$name', Description = '$description', ";
$query .= "Alias = '$alias', ContentAreas.Order = '$order' WHERE ContentAreas_ID = '$contentid', ModifyBy = '$modifyid', ModifyDate = now()";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to Update Content Area record from CMS Database.');
}

?>

<p>Successfully Updated <?php echo mysqli_affected_rows($db); ?> record.</p>
<a href="../Presentation/manageContentAreas.php">Back to Manage Content Areas page</a>