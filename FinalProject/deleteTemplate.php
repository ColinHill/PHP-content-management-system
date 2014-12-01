<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();
$templateid = $_POST['delete'];

$query = "DELETE FROM CSSTemplates WHERE CSSTemplates_ID = '$templateid'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to delete record from CMS Datbase:' . mysqli_error($db));
}

?>

<p>Successfully deleted <?php echo mysqli_affected_rows($db); ?> records.</p>
<a href="manageTemplates.php">Back to Manage Templates page</a>
