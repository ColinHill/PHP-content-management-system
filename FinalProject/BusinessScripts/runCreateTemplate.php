<!DOCTYPE html>

<?php
if(!isset($_SESSION['editor'])){
    header("location:../Presentation/main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:../Presentation/main_login.php");
}
?>

<html>
<head>
    <h1>Template Created:</h1>
</head>
<body>
<?php
include_once("../DataAccess/dbConnect.php");
$db = dbConnect::getTemplateConnection();

$name = mysqli_real_escape_string($db, $_POST['Name']);
$description = mysqli_real_escape_string($db, $_POST['Description']);
$csssnippet = mysqli_real_escape_string($db, $_POST['CSSSnippet']);

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
<a href="../Presentation/manageTemplates.php">Back to Manage CSS Templates page</a>
</body>
</html>