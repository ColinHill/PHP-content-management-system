<?php
session_start();

include_once('../DataAccess/dbConnect.php');
$db = dbConnect::getPagesConnection();

if(!isset($_SESSION['myusername'])){
    header("location:main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['author'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:main_login.php");
}

$siteid = mysqli_real_escape_string($db, $_POST['update']);

$query = "SELECT * FROM SitePages WHERE SitePages_ID = '$siteid'";
$result = mysqli_query($db, $query);

while ($row = mysqli_fetch_assoc($result)):
    $name = strip_tags($row['Name']);
    $alias = strip_tags($row['Alias']);
    $description = strip_tags($row['Description']);

endwhile;
?>
<html>
<head>
    <script src="validation.js"></script>
    <title>Update Site Page:</title>
</head>

<body>

<form action="managePages.php">
    <input type="submit" value="Return To Manage Pages" />
</form>

<form id="updatePage" method="post" onsubmit="return validateForm2()" action="../DataAccess/runUpdatePage.php">

    <p>Site Page ID:
        <input id="SitePages_ID" name="SitePages_ID" type="text" maxlength="255" value="<?php echo strip_tags($siteid); ?>" readonly="readonly" />

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value="<?php echo strip_tags($name); ?>"/>

    <p>Alias:
        <input id="Alias" name="Alias" type="text" maxlength="255" value="<?php echo strip_tags($alias); ?>"/>

    <p>Description:
        <input id="Description" name="Description" type="text" size="100" maxlength="255" value="<?php echo strip_tags($description); ?>"/>

    <p><input id="submit" type="submit" name="submit" value="Update Site Page" />

</body>
</html>