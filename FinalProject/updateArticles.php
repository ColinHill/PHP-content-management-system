<?php
include_once ('dbConnect.php');
$db = dbConnect::getConnection();
$Articles_ID = $_POST['update'];

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
    <title>Update Article:</title>
</head>

<body>

<form id="updateArticle" method="post" action="runUpdateArticles.php">

    <p>Template ID:
        <input id="Articles_ID" name="Articles_ID" type="text" maxlength="255" value="<?php echo $Articles_ID; ?>" readonly="readonly" />

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value="<?php echo $name; ?>"/>

    <p>Title:
        <input id="Title" name="Title" type="text" maxlength="255" value="<?php echo $title; ?>"/>

    <p>Description:
        <input id="Description" name="Description" type="text" size="100" maxlength="255" value="<?php echo $description; ?>"/>

    <p>Page:
        <input id="Page" name="Page" type="text" value="<?php echo $page; ?>"/>

    <p>Content Area:</p>

    <?php
    $queryCA = "SELECT * FROM ContentAreas ORDER BY ContentAreas_ID ASC";
    $resultCA = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($resultCA)):
    $contentAreaValue = $row['ContentArea'];
    $contentAreaName = $row['Name'];
    ?>

    <p>
        <input type="radio" name="<?php echo $contentAreaName ?>" value="<?php echo $contentAreaValue ?>"
        <?php if ($contentArea == $contentAreaValue) {echo "checked";}?> /><?php echo $contentAreaName ?>
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
        <textarea form="updateArticle" name="HTMLSnippet" cols="100" rows="20" maxlength="10000" wrap="soft" value=""><?php echo $htmlSnippet; ?>
        </textarea>

    <p><input id="submit" type="submit" name="submit" value="Update Article" />

</body>
</html>