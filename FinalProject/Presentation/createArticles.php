<?php
session_start();

    include_once("../DataAccess/dbConnect.php");
    $db = dbConnect::getArticleConnection();

if(!isset($_SESSION['myusername'])){
    header("location:main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['author'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:main_login.php");
}

?>

<html>
<head>
    <script src="validation.js"></script>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
    <title>Create Article:</title>
</head>

<body>

<form action="manageArticles.php">
    <input type="submit" value="Return To Manage Articles" />
</form>

<form id="createArticle" method="post" action="../BusinessScripts/runCreateArticles.php" onsubmit="return validateForm3()">

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value=""/>

    <p>Title:
        <input id="Title" name="Title" type="text" maxlength="255" value=""/>

    <p>Description:
        <input id="Description" name="Description" type="text" size="100" maxlength="255" value=""/>

    <p>Page:<p>
        <input id="Page" name="Page" type="text" value=""/>

    <p>Content Area:</p>
    <?php
    $queryCA = "SELECT * FROM ContentAreas ORDER BY ContentAreas_ID ASC";
    $resultCA = mysqli_query($db, $queryCA);

    $contentArea = 1;

    while ($row = mysqli_fetch_assoc($resultCA)):
        $contentAreaValue = $row['ContentAreas_ID'];
        $contentAreaName = $row['Name'];
        ?>

        <p>
            <input type="radio" id="contentRadio" name="createArticle" value="<?php echo strip_tags($contentAreaValue) ?>"
                <?php if ($contentArea == $contentAreaValue) {echo "checked";}?> /><?php echo strip_tags($contentAreaName) ?>
        </p>

    <?php endwhile; ?>

    <p>All Pages:
        <input type="checkbox" name="allPages" value="A" />

    <p>HTML Snippet:<p>
        <textarea form="createArticle" name="HTMLSnippet">
        </textarea>

    <p><input id="submit" type="submit" name="submit" value="Create Article" />
</form>
</body>
</html>