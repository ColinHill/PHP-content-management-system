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
    <h1>Template Updated:</h1>
</head>
<body>
<?php
include_once("../DataAccess/dbConnect.php");
$db = dbConnect::getTemplateConnection();

$CSSTemplates_ID = mysqli_real_escape_string($db, $_POST['CSSTemplates_ID']);
$name = mysqli_real_escape_string($db, $_POST['Name']);
$description = mysqli_real_escape_string($db, $_POST['Description']);
$csssnippet = mysqli_real_escape_string($db, $_POST['CSSSnippet']);
$modifyby = $_SESSION['myusername'];

$query = "SELECT User_ID FROM Users WHERE user_name = '$modifyby'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$modifyid = $row['User_ID'];


$query = "UPDATE CSSTemplates SET Name = '$name', Description = '$description', ";
$query .= "CSSSnippet = '$csssnippet' WHERE CSSTemplates_ID = '$CSSTemplates_ID', ModifyBy = '$modifyid', ModifyBy = now()";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to Update CSS Template record from CMS Database.');
}

?>

<p>Successfully Updated <?php echo mysqli_affected_rows($db); ?> records(s).</p>
<a href="../Presentation/manageTemplates.php">Back to Manage CSS Templates page</a>