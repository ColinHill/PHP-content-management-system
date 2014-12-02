<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();
$pageid = $_POST['delete'];

$query = "DELETE FROM SitePages WHERE SitePages_ID = '$pageid'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to delete Site Page record from CMS Datbase:' . mysqli_error($db));
}

?>

<p>Successfully deleted <?php echo mysqli_affected_rows($db); ?> record.</p>
<a href="managePages.php">Back to Manage Site Pages page</a>
