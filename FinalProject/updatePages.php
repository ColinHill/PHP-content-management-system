<?php
include_once ('dbConnect.php');
$db = dbConnect::getConnection();
$siteid = $_POST['update'];

$query = "SELECT * FROM SitePages WHERE SitePages_ID = '$siteid'";
$result = mysqli_query($db, $query);

while ($row = mysqli_fetch_assoc($result)):
    $name = $row['Name'];
    $alias = $row['Alias'];
    $description = $row['Description'];

endwhile;
?>
<html>
<head>
    <title>Update Site Page:</title>
</head>

<body>

<form action="managePages.php">
    <input type="submit" value="Return To Manage Pages" />
</form>

<form id="updatePage" method="post" action="runUpdatePage.php">

    <p>Site Page ID:
        <input id="SitePages_ID" name="SitePages_ID" type="text" maxlength="255" value="<?php echo $siteid; ?>" readonly="readonly" />

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value="<?php echo $name; ?>"/>

    <p>Alias:
        <input id="Alias" name="Alias" type="text" maxlength="255" value="<?php echo $alias; ?>"/>

    <p>Description:
        <input id="Description" name="Description" type="text" size="100" maxlength="255" value="<?php echo $description; ?>"/>

    <p><input id="submit" type="submit" name="submit" value="Update Site Page" />

</body>
</html>