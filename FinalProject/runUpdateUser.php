<!DOCTYPE html>
<html>
<head>
    <h1>User Updated:</h1>
</head>
<body>
<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();

$User_ID = 5;//$_POST['User_ID'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$salt = $_POST['salt'];
$administrator = $_POST['Administrator'];
$editor = $_POST['Editor'];
$author = $_POST['Author'];

$query = "UPDATE Users SET first_name = '$first_name', last_name = '$last_name', ";
$query .= "user_name = '$user_name', password = '$password', salt = '$salt' ";
$query .= "WHERE User_ID = '$User_ID'";

$result = mysqli_query($db, $query);

if(!$result)
{
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
<a href="manageUsers.php">Back to Manage Users page</a>