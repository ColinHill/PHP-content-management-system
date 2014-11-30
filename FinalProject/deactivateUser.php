<?php
    include_once ("dbConnect.php");
    $db = dbConnect::getConnection();
$userid = $_POST['deactivate'];

$query = "UPDATE Privileges SET Administrator = 0, Editor = 0, Author = 0 WHERE Users_User_ID = '$userid'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to deactivate record from CMS Datbase:' . mysqli_error($db));
}

?>

<p>Successfully deactivated <?php echo mysqli_affected_rows($db); ?> records(s).</p>
<a href="manageUsers.php">Back to Manage Users page</a>
