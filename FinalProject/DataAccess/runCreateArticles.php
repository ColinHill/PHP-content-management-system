<!DOCTYPE html>

<?php
if(!isset($_SESSION['editor'])){
    header("location:../Presentation/main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['author'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:../Presentation/main_login.php");
}
?>

<html>
<head>
    <h1>Article Created:</h1>
</head>
<body>
<?php
include_once("../DataAccess/dbConnect.php");
$db = dbConnect::getArticleConnection();

$name = mysqli_real_escape_string($db, $_POST['Name']);
$title = mysqli_real_escape_string($db, $_POST['Title']);
$description = mysqli_real_escape_string($db, $_POST['Description']);
$page = mysqli_real_escape_string($db, $_POST['Page']);
$contentArea = mysqli_real_escape_string($db, $_POST['createArticle']);
$htmlSnippet = mysqli_real_escape_string($db, $_POST['HTMLSnippet']);
$allPages = mysqli_real_escape_string($db, $_POST['allPages']);

if (!ISSET ($page))
{
    $page = 50;
}
if(empty ($allPages))
{
    $allPages = 0;
}
else
{
    $allPages = 1;
}

if ($page == 50)
{
    $query = "INSERT INTO Articles (Name, Title, Description, HTMLSnippet, Page, AllPages, ContentArea, CreatedBy) ";
    $query .= "VALUES ('$name', '$title', '$description', '$htmlSnippet', NULL, '$allPages', '$contentArea', 1)";
}
else
{
$query = "INSERT INTO Articles (Name, Title, Description, HTMLSnippet, Page, AllPages, ContentArea, CreatedBy) ";
$query .= "VALUES ('$name', '$title', '$description', '$htmlSnippet', '$page', '$allPages', '$contentArea', 1)";
}

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
<a href="../Presentation/manageArticles.php">Back to Manage Articles page</a>
</body>
</html>