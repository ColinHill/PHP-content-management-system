<?php
session_start();

    include_once("../DataAccess/dbConnect.php");
    $db = dbConnect::getUserConnection();

if(!isset($_SESSION['myusername'])){
    header("location:../Presentation/main_login.php");
}
if($_SESSION['admin'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:../Presentation/main_login.php");
}

$userid = mysqli_real_escape_string($db, $_POST['deactivate']);

$query = "UPDATE Privileges SET Administrator = 0, Editor = 0, Author = 0 WHERE Users_User_ID = '$userid'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to deactivate record from CMS Datbase:' . mysqli_error($db));
}

?>

<p>Successfully deactivated <?php echo mysqli_affected_rows($db); ?> records(s).</p>
<a href="../Presentation/manageUsers.php">Back to Manage Users page</a>
