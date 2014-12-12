<!DOCTYPE html>
<html>
<head>
        <h1>User Created:</h1>
</head>
<body>
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

$first_name = mysqli_real_escape_string($db, $_POST['first_name']);
$last_name = mysqli_real_escape_string($db, $_POST['last_name']);
$user_name = mysqli_real_escape_string($db, $_POST['user_name']);

//$Salt = mysqli_real_escape_string($db, $_POST['first_name']);
$temp_password = mysqli_real_escape_string($db, $_POST['password']);
$password = crypt($temp_password, '$5$rounds=5000$anexamplestringforsalt$');

$administrator = mysqli_real_escape_string($db, $_POST['Administrator']);
$editor = mysqli_real_escape_string($db, $_POST['Editor']);
$author = mysqli_real_escape_string($db, $_POST['Author']);

if ($administrator == null)
{
    $administrator = 0;
}
if ($editor == null)
{
    $editor = 0;
}
if ($author == null)
{
    $author = 0;
}

$query = "INSERT INTO Users (first_name, last_name, user_name, password, CreatedBy) ";
$query .= "VALUES ('$first_name', '$last_name', '$user_name', '$password', '1')";

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

$userquery = "SELECT * FROM Users ORDER BY User_ID DESC LIMIT 1";
$result = mysqli_query($db, $userquery);
if(!$result)
{
    die('Unable to select record from CMS Database.');
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
            <td><?php echo strip_tags($row['User_ID']); ?></td>
            <td><?php echo strip_tags($row['first_name']); ?></td>
            <td><?php echo strip_tags($row['last_name']); ?></td>
            <td><?php echo strip_tags($row['user_name']); ?></td>
            <?php
            endwhile;
            $privquery = "SELECT * FROM Privileges ORDER BY Privileges_ID DESC LIMIT 1;";
            $result = mysqli_query($db, $privquery);
            while($row = mysqli_fetch_assoc($result)):
            ?>
            <td><?php echo strip_tags($row['Administrator']) ?></td>
            <td><?php echo strip_tags($row['Editor']) ?></td>
            <td><?php echo strip_tags($row['Author']) ?></td>
        </tr>
        <p>Successfully Inserted <?php echo mysqli_affected_rows($db); ?> records(s).</p>
    <?php
    endwhile;
    dbConnect::closeConnection($db);
    ?>
    </tbody>
</table>
<a href="../Presentation/manageUsers.php">Back to Manage Users page</a>
</body>
</html>