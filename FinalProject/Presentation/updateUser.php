<?php
session_start();

include_once("../DataAccess/dbConnect.php");
$db = dbConnect::getUserConnection();

if(!isset($_SESSION['myusername'])){
    header("location:main_login.php");
}
if($_SESSION['admin'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:main_login.php");
}

$userid = mysqli_real_escape_string($db, $_POST['update']);
$query = "SELECT * FROM Users WHERE User_ID = '$userid'";
$result = mysqli_query($db, $query);

while ($row = mysqli_fetch_assoc($result)):
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$user_name = $row['user_name'];
$password = $row['password'];
$salt = $row['salt'];
endwhile;

$query = "SELECT * FROM Privileges WHERE Users_User_ID = '$userid'";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)):
$administrator = $row['Administrator'];
$editor = $row['Editor'];
$author = $row['Author'];
endwhile;
?>
<html>
<head>
    <script src="validation.js"></script>
    <title>Update User</title>

</head>

<body>

<form action="manageUsers.php">
    <input type="submit" value="Return To Manage Users" />
</form>

<form id="updateUser" method="post" onsubmit="return validateForm9()" action="../BusinessScripts/runUpdateUser.php">

    <p>User ID:
        <input id="User_ID" name="User_ID" type="text" maxlength="255" value="<?php echo strip_tags($userid); ?>" readonly="readonly" />

    <p>First Name:
        <input id="first_name" name="first_name" type="text" maxlength="255" value="<?php echo strip_tags($first_name); ?>"/>

    <p>Last Name:
        <input id="last_name" name="last_name" type="text" maxlength="255" value="<?php echo strip_tags($last_name); ?>"/>

    <p>Username:
        <input id="user_name" name="user_name" type="text" maxlength="255" value="<?php echo strip_tags($user_name); ?>"/>

    <p>Password:
        <input id="password" name="password" type="text" maxlength="255" value="<?php echo strip_tags($password); ?>"/>

    <p>Privileges:

    <p>	<input id="Administrator" name="Administrator" class="element checkbox" type="checkbox"
                  value="" <?php if($administrator == 1){echo "checked";}?>/>
        Administrator

    <p> <input id="Editor" name="Editor" class="element checkbox" type="checkbox"
               value="" <?php if($editor == 1){echo "checked";}?>/>
        Editor

    <p> <input id="Author" name="Author" class="element checkbox" type="checkbox"
               value="" <?php if($author == 1){echo "checked";}?>/>
        Author

    <p><input id=" " type="submit" name="submit" value="Update User" />

</body>
</html>