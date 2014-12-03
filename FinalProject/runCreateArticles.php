<!DOCTYPE html>
<html>
<head>
    <h1>Article Created:</h1>
</head>
<body>
<?php
include_once ("dbConnect.php");
$db = dbConnect::getConnection();

$name = $_POST['Name'];
$title = $_POST['Title'];
$description = $_POST['Description'];
$page = $_POST['Page'];
$contentArea = $_POST['createArticle'];
$htmlSnippet = $_POST['HTMLSnippet'];
$allPages = $_POST['allPages'];
if(empty ($allPages))
{
    $allPages = 0;
}

$query = "INSERT INTO Articles (Name, Title, Description, HTMLSnippet, Page, AllPages, ContentArea, CreatedBy) ";
$query .= "VALUES ('$name', '$title', '$description', '$htmlSnippet', '$page', '$allPages', '$contentArea', 1)";

$result = mysqli_query($db, $query);

if(!$result)
{
    die('Unable to insert Article into CMS Database.');
}

?>

<p>Successfully Inserted <?php echo mysqli_affected_rows($db); ?> record.</p>
<?php
dbConnect::closeConnection($db);
?>
</tbody>
</table>
<a href="manageArticles.php">Back to Manage Articles page</a>
</body>
</html>