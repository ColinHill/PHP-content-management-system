<?php
session_start();

include_once("../DataAccess/dbConnect.php");
$db = dbConnect::getContentAreaConnection();

if(!isset($_SESSION['myusername'])){
    header("location:../Presentation/main_login.php");
}
if($_SESSION['editor'] != 1){
    header("location:../Presentation/main_login.php");
}

$contentid = mysqli_real_escape_string($db, $_POST['delete']);

$query = "DELETE FROM ContentAreas WHERE ContentAreas_ID = '$contentid'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to delete Content Area record from CMS Datbase:' . mysqli_error($db));
}

?>

<p>Successfully deleted <?php echo mysqli_affected_rows($db); ?> record.</p>
<a href="../Presentation/manageContentAreas.php">Back to Manage Content Areas page</a>
