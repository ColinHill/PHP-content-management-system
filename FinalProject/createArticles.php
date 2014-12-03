<?php
    include_once ("dbConnect.php");
    $db = dbConnect::getConnection();
?>

<html>
<head>
    <script src="validation.js"></script>
    <title>Create Article:</title>
</head>

<body>

<form action="manageArticles.php">
    <input type="submit" value="Return To Manage Articles" />
</form>

<form id="createArticle" method="post" action="runCreateArticles.php" onsubmit="return validateForm3()">

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
        $contentAreaValue = $row['Order'];
        $contentAreaName = $row['Name'];
        ?>

        <p>
            <input type="radio" name="createArticle" value="<?php echo $contentAreaValue ?>"
                <?php if ($contentArea == $contentAreaValue) {echo "checked";}?> /><?php echo $contentAreaName ?>
        </p>

    <?php endwhile; ?>

    <p>All Pages:
        <input type="checkbox" name="allPages" />

    <p>HTML Snippet:<p>
        <textarea form="updateArticle" name="HTMLSnippet" cols="100" rows="20" maxlength="10000" wrap="soft" value="">
        </textarea>

    <p><input id="submit" type="submit" name="submit" value="Create Article" />

</body>
</html>