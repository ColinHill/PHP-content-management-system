<!DOCTYPE html>
<html>
<head>
    <h1>Template Created:</h1>
</head>
<body>
<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();

$name = $_POST['Name'];
$description = $_POST['Description'];
$csssnippet = $_POST['CSSSnippet'];

$query = "INSERT INTO CSSTemplates (Name, Description, CSSSnippet, ActiveState, CreatedBy) ";
$query .= "VALUES ('$name', '$description', '$csssnippet', 0, 1)";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to insert CSS Template into CMS Database.');
}

?>

    <p>Successfully Inserted <?php echo mysqli_affected_rows($db); ?> records.</p>
    <?php
    dbConnect::closeConnection($db);
    ?>
    </tbody>
</table>
<a href="manageTemplates.php">Back to Manage CSS Templates page</a>
</body>
</html>