<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();
$articleid = $_POST['delete'];

$query = "DELETE FROM Articles WHERE Articles_ID = '$articleid'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to delete Article record from CMS Datbase:' . mysqli_error($db));
}

?>

<p>Successfully deleted <?php echo mysqli_affected_rows($db); ?> record.</p>
<a href="manageArticles.php">Back to Manage Articles page</a>
