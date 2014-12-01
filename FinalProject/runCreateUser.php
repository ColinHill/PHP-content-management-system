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
if (!isset($_POST['Administrator']))
{
    $administrator = 0;
}
else {
    $administrator = 1;
}

if (!isset($_POST['Editor']))
{
    $editor = 0;
}
else {
    $editor = 1;
}

if (!isset($_POST['Author']))
{
    $author = 0;
}
else {
    $author = 1;
}

$query = "INSERT INTO Users (first_name, last_name, user_name, password, salt, CreatedBy) ";
$query .= "VALUES ('$first_name', '$last_name', '$user_name', '$password', '$salt', '1')";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to insert records into CMS Database.');
}

$query = "SELECT LAST_INSERT_ID()";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to obtain auto-incremented ID');
}

$useridlink = mysqli_fetch_assoc($result);
$work = $useridlink['LAST_INSERT_ID()'];

$query = "INSERT INTO Privileges (Administrator, Editor, Author, Users_User_ID) ";
$query .= "VALUES ('$administrator', '$editor', '$author', '$work')";

$result = mysqli_query($db, $query);

if(!$result)
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
        <th>Editor</th>
        <th>Author</th>
    </thread>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['User_ID']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['Administrator'] ?></td>
            <td><?php echo $row['Editor'] ?></td>
            <td><?php echo $row['Author'] ?></td>
        </tr>
        <p>Successfully Inserted <?php echo mysqli_affected_rows($db); ?> records(s).</p>
        <a href="manageUsers.php">Back to Manage Users page</a>
    <?php
    endwhile;
    dbConnect::closeConnection($db);
    ?>
    </tbody>
</table>
</body>
</html>