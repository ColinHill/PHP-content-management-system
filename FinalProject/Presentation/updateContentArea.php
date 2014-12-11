<?php
session_start();

include_once('../DataAccess/dbConnect.php');
$db = dbConnect::getContentAreaConnection();

if(!isset($_SESSION['myusername'])){
    header("location:main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:main_login.php");
}

$contentid = mysqli_real_escape_string($db, $_POST['update']);

$query = "SELECT * FROM ContentAreas WHERE ContentAreas_ID = '$contentid'";
$result = mysqli_query($db, $query);

while ($row = mysqli_fetch_assoc($result)):
    $name = $row['Name'];
    $alias = $row['Alias'];
    $order = $row['Order'];
    $description = $row['Description'];

endwhile;
?>
<html>
<head>
    <script src="validation.js"></script>
    <title>Update Content Area:</title>
</head>

<body>

<form action="manageContentAreas.php">
    <input type="submit" value="Return To Manage Content Areas" />
</form>

<form id="updateContent" method="post" onsubmit="return formValidate5()" action="../DataAccess/runUpdateContent.php">

    <p>Template ID:
        <input id="ContentAreas_ID" name="ContentAreas_ID" type="text" maxlength="255" value="<?php echo strip_tags($contentid); ?>" readonly="readonly" />

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value="<?php echo strip_tags($name); ?>"/>

    <p>Alias:
        <input id="Alias" name="Alias" type="text" maxlength="255" value="<?php echo strip_tags($alias); ?>"/>

    <p>Order:
        <input id="Order" name="Order" type="text" maxlength="255" value="<?php echo strip_tags($order); ?>"/>

    <p>Description:
        <input id="Description" name="Description" type="text" size="100" maxlength="255" value="<?php echo strip_tags($description); ?>"/>

    <p><input id="submit" type="submit" name="submit" value="Update Content Area" />

</body>
</html>