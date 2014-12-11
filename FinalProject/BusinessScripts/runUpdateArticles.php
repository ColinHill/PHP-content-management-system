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
    <h1>Article Updated:</h1>
</head>
<body>
<?php
include_once("../DataAccess/dbConnect.php");
$db = dbConnect::getArticleConnection();

$Article_ID = mysqli_real_escape_string($db, $_POST['Articles_ID']);
$name = mysqli_real_escape_string($db, $_POST['Name']);
$title = mysqli_real_escape_string($db, $_POST ['Title']);
$description = mysqli_real_escape_string($db, $_POST['Description']);
$htmlSnippet = mysqli_real_escape_string($db, $_POST['HTMLSnippet']);
$contentArea = mysqli_real_escape_string($db, $_POST['updateArticle']);
$allPages = mysqli_real_escape_string($db, $_POST['allPages']);
$page = mysqli_real_escape_string($db, $_POST['Page']);
$modifyby = $_SESSION['myusername'];

$query = "SELECT User_ID FROM Users WHERE user_name = '$modifyby'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$modifyid = $row['User_ID'];
//test

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
    $query .= "AllPages = '$allPages', Page = NULL, HTMLSnippet = '$htmlSnippet' WHERE Articles_ID = '$Article_ID', ModifyBy = '$modifyid', ModifyDate = now()";
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
<a href="../Presentation/manageArticles.php">Back to Manage Articles page</a>