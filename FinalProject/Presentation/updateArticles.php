<?php
session_start();

include_once('../DataAccess/dbConnect.php');
$db = dbConnect::getArticleConnection();

if(!isset($_SESSION['myusername'])){
    header("location:main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['author'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:main_login.php");
}

$Articles_ID = mysqli_real_escape_string($db, $_POST['update']);

$query = "SELECT * FROM Articles WHERE Articles_ID = '$Articles_ID'";
$result = mysqli_query($db, $query);

while ($row = mysqli_fetch_assoc($result)):
$contentArea = $row['ContentArea'];
$allPages = $row['AllPages'];
$name = $row['Name'];
$title = $row['Title'];
$description = $row['Description'];
$page = $row['Page'];
$htmlSnippet = $row['HTMLSnippet'];

endwhile;
$isAllPages = false;
if ($allPages == 1)
{
    $isAllPages = true;
}//end if

?>
<html>
<head>
    <script src="validation.js"></script>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
    <title>Update Article:</title>
</head>

<body>

<form action="manageArticles.php">
    <input type="submit" value="Return To Manage Articles" />
</form>

<form id="updateArticle" method="post" onsubmit="return formValidate4()" action="../BusinessScripts/runUpdateArticles.php">

    <p>Article ID:
        <input id="Articles_ID" name="Articles_ID" type="text" maxlength="255" value="<?php echo strip_tags($Articles_ID); ?>" readonly="readonly" />

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value="<?php echo strip_tags($name); ?>"/>

    <p>Title:
        <input id="Title" name="Title" type="text" maxlength="255" value="<?php echo strip_tags($title); ?>"/>

    <p>Description:
        <input id="Description" name="Description" type="text" size="100" maxlength="255" value="<?php echo strip_tags($description); ?>"/>

    <p>Page:
        <input id="Page" name="Page" type="text" value="<?php echo $page; ?>"/>

    <p>Content Area:</p>

    <?php
    $queryCA = "SELECT * FROM ContentAreas ORDER BY ContentAreas_ID ASC";
    $resultCA = mysqli_query($db, $queryCA);

    while ($row = mysqli_fetch_assoc($resultCA)):
    $contentAreaValue = $row['ContentAreas_ID'];
    $contentAreaName = $row['Name'];
    ?>

    <p>
        <input type="radio" name="updateArticle" value="<?php echo strip_tags($contentAreaValue) ?>"
        <?php if ($contentArea == $contentAreaValue) {echo "checked";}?> /><?php echo strip_tags($contentAreaName) ?>
    </p>

    <?php endwhile; ?>

    <p>All Pages:
    <input type="checkbox" name="allPages"
    <?php
    if ($isAllPages == true)
    {echo " checked />";}
    else
    {echo " />";}
    ?>

    <p>
        <textarea form="updateArticle" name="HTMLSnippet"><?php echo htmlspecialchars($htmlSnippet);?>
        </textarea>

    <p><input id="submit" type="submit" name="submit" value="Update Article" />

</body>
</html>