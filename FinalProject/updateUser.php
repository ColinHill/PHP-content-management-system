<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();

$userid = $_POST['update'];
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

<form id="updateUser" method="post" onsubmit="return validateForm()" action="runUpdateUser.php">

    <p>User ID:
        <input id="User_ID" name="User_ID" type="text" maxlength="255" value="<?php echo $userid; ?>" readonly="readonly" />

    <p>First Name:
        <input id="first_name" name="first_name" type="text" maxlength="255" value="<?php echo $first_name; ?>"/>

    <p>Last Name:
        <input id="last_name" name="last_name" type="text" maxlength="255" value="<?php echo $last_name; ?>"/>

    <p>Username:
        <input id="user_name" name="user_name" type="text" maxlength="255" value="<?php echo $user_name; ?>"/>

    <p>Password:
        <input id="password" name="password" type="text" maxlength="255" value="<?php echo $password; ?>"/>

    <p>Salt:
        <input id="salt" name="salt" type="text" maxlength="255" value="<?php echo $salt; ?>"/>

    <p>Privileges:

    <p>	<input id="Administrator" name="Administrator" class="element checkbox" type="checkbox" value="0" />
        Administrator

    <p> <input id="Editor" name="Editor" class="element checkbox" type="checkbox" value="0" />
        Editor

    <p> <input id="Author" name="Author" class="element checkbox" type="checkbox" value="0" />
        Author

    <p><input id=" " type="submit" name="submit" value="Update User" />

</body>
</html>