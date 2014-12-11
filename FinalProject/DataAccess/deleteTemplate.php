<?php
include_once("../DataAccess/dbConnect.php");
session_start();

if(!isset($_SESSION['myusername'])){
    header("location:../Presentation/main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:../Presentation/main_login.php");
}

$db = dbConnect::getTemplateConnection();

$templateid = mysqli_real_escape_string($db, $_POST['delete']);

$query = "DELETE FROM CSSTemplates WHERE CSSTemplates_ID = '$templateid'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to delete record from CMS Datbase:' . mysqli_error($db));
}

?>

<p>Successfully deleted <?php echo mysqli_affected_rows($db); ?> records.</p>
<a href="../Presentation/manageTemplates.php">Back to Manage Templates page</a>
