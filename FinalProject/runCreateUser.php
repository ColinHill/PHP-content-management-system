<!DOCTYPE html>
<html>
<head>
        <h1>User Created:</h1>
</head>
<body>
<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$salt = $_POST['salt'];
$administrator = $_POST['Administrator'];
$editor = $_POST['Editor'];
$author = $_POST['Author'];

$query = "INSERT INTO Users (first_name, last_name, user_name, password, salt, CreatedBy)";
$query .= "VALUES ('";
$query .= $first_name;
$query .= "', '";
$query .= $last_name;
$query .= "', '";
$query .= $user_name;
$query .= "', '";
$query .= $password;
$query .= "', '";
$query .= $salt;
$query .= "', '";
$query .= 1;
$query .= "');";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to inset records into CMS Database.');
}

$query = "SELECT * FROM Users ORDER BY User_ID DESC LIMIT 1";

$userinfo = mysqli_query($db, $query);
if(!$userinfo)
{
    die('Unable to retrieve records from CMS Database');
}

$User = "SELECT User_ID FROM Users ORDER User_ID DESC";

$query = "INSERT INTO Privileges (Administrator, Editor, Author, Users_User_ID)";
$query .= "VALUES ('";
$query .= $administrator;
$query .= "', '";
$query .= $editor;
$query .= "', '";
$query .= $author;
$query .= "', '";
$query .= $User;
$query .= "');";

$userpriv = mysqli_query($db, $query);

if(!$userpriv)
{
    die('Unable to insert Privilege into CMS Database.');
}

?>

<table>
    <thread>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>User Name</th>
        <th>Administrator</th>
    </thread>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($userinfo)): ?>
        <tr>
            <td><?php echo $row['User_ID']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php $row = mysqli_fetch_assoc($userpriv); echo $row['Administrator'] ?></td>
        </tr>
    <?php
    endwhile;
    dbConnect::closeConnection($db);
    ?>
    </tbody>
</table>
</body>
</html>