<?php
include_once ('dbConnect.php');
$db = dbConnect::getConnection();
$contentid = $_POST['update'];

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
    <title>Update Content Area:</title>
</head>

<body>

<form id="updateContent" method="post" action="runUpdateContent.php">

    <p>Template ID:
        <input id="ContentAreas_ID" name="ContentAreas_ID" type="text" maxlength="255" value="<?php echo $contentid; ?>" readonly="readonly" />

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value="<?php echo $name; ?>"/>

    <p>Alias:
        <input id="Alias" name="Alias" type="text" maxlength="255" value="<?php echo $alias; ?>"/>

    <p>Order:
        <input id="Order" name="Order" type="text" maxlength="255" value="<?php echo $order; ?>"/>

    <p>Description:
        <input id="Description" name="Description" type="text" size="100" maxlength="255" value="<?php echo $description; ?>"/>

    <p><input id="submit" type="submit" name="submit" value="Update Content Area" />

</body>
</html>