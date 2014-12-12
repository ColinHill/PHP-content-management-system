<?php
session_start();

include_once("../DataAccess/dbConnect.php");
$db = dbConnect::getArticleConnection();

if(!isset($_SESSION['myusername'])){
    header("location:../Presentation/main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['author'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:../Presentation/main_login.php");
}

$articleid = mysqli_real_escape_string($db, $_POST['delete']);

$query = "UPDATE Articles SET Page = NULL, AllPages = 0 WHERE Articles_ID = '$articleid'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to delete Article record from CMS Datbase:' . mysqli_error($db));
}

?>

<p>Successfully deactivated <?php echo mysqli_affected_rows($db); ?> record.</p>
<a href="../Presentation/manageArticles.php">Back to Manage Articles page</a>
