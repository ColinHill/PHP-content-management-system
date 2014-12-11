<!DOCTYPE html>

<?php
session_start();

if(!isset($_SESSION['myusername'])){
    header("location:../Presentation/main_login.php");
}
if($_SESSION['admin'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:../Presentation/main_login.php");
}
?>
<html>
<head>
    <h1>User Updated:</h1>
</head>
<body>
<?php
include_once("../DataAccess/dbConnect.php");
$db = dbConnect::getUserConnection();

$User_ID = mysqli_real_escape_string($db, $_POST['User_ID']);
$first_name = mysqli_real_escape_string($db, $_POST['first_name']);
$last_name = mysqli_real_escape_string($db, $_POST['last_name']);
$user_name = mysqli_real_escape_string($db, $_POST['user_name']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$administrator = mysqli_real_escape_string($db, $_POST['Administrator']);
$editor = mysqli_real_escape_string($db, $_POST['Editor']);
$author = mysqli_real_escape_string($db, $_POST['Author']);
$modifyby = $_SESSION['myusername'];

$query = "SELECT User_ID FROM Users WHERE user_name = '$modifyby'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$modifyid = $row['User_ID'];

$query = "UPDATE Users SET first_name = '$first_name', last_name = '$last_name', ";
$query .= "user_name = '$user_name', password = '$password', ModifyBy = '$modifyid', ModifyDate = now() ";
$query .= "WHERE User_ID = '$User_ID'";

$result = mysqli_query($db, $query);

if(!$result){

    die('Unable to Update User record from CMS Database.');
}

$query = "UPDATE Privileges SET Administrator = '$administrator', Editor = '$editor', Author = '$author' ";
$query .= "WHERE Users_User_ID = '$User_ID'";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to Update Privilege record from CMS Database.');
}
?>

<p>Successfully Updated <?php echo mysqli_affected_rows($db); ?> records(s).</p>
<a href="../Presentation/manageUsers.php">Back to Manage Users page</a>