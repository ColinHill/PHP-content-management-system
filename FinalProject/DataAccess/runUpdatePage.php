<!DOCTYPE html>

<?php
session_start();

if(!isset($_SESSION['myusername'])){
    header("location:../Presentation/main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['author'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:../Presentation/main_login.php");
}
?>

<html>
<head>
    <h1>Site Page Updated:</h1>
</head>
<body>
<?php
include_once("../DataAccess/dbConnect.php");
$db = dbConnect::getPagesConnection();

$siteid = mysqli_real_escape_string($db, $_POST['SitePages_ID']);
$name = mysqli_real_escape_string($db, $_POST['Name']);
$alias = mysqli_real_escape_string($db, $_POST['Alias']);
$description = mysqli_real_escape_string($db, $_POST['Description']);
$modifyby = $_SESSION['myusername'];

$query = "SELECT User_ID FROM Users WHERE user_name = '$modifyby'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$modifyid = $row['User_ID'];


$query = "UPDATE SitePages SET Name = '$name', Description = '$description', ";
$query .= "Alias = '$alias' WHERE SitePages_ID = '$siteid', ModibyBy = '$modifyid', ModifyDate = now()";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to Update Site Page record from CMS Database.');
}

?>


<?php
if ($_SESSION['Author' == 1]){
    ?>

    <a href="../Presentation/authorManagePages.php">Back to Manage Site Pages page</a><?php
}
else{
    ?>
    <a href="../Presentation/authorManagePages.php">Back to Manage Site Pages page</a>
<?php
}
?>

<p>Successfully Updated <?php echo mysqli_affected_rows($db); ?> records.</p>
