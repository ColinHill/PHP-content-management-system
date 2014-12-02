<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();
$contentid = $_POST['delete'];

$query = "DELETE FROM ContentAreas WHERE ContentAreas_ID = '$contentid'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to delete Content Area record from CMS Datbase:' . mysqli_error($db));
}

?>

<p>Successfully deleted <?php echo mysqli_affected_rows($db); ?> record.</p>
<a href="manageContentAreas.php">Back to Manage Content Areas page</a>
