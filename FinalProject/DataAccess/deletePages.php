<?php
session_start();

include_once("../DataAccess/dbConnect.php");
$db = dbConnect::getPagesConnection();

if(!isset($_SESSION['myusername'])){
    header("location:../Presentation/main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['author'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:../Presentation/main_login.php");
}

$pageid = mysqli_real_escape_string($db, $_POST['delete']);

$query = "DELETE FROM SitePages WHERE SitePages_ID = '$pageid'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to delete Site Page record from CMS Datbase:' . mysqli_error($db));
}

?>

<p>Successfully deleted <?php echo mysqli_affected_rows($db); ?> record.</p>
<a href="../Presentation/managePages.php">Back to Manage Site Pages page</a>
