
<?php
session_start();

if(!isset($_SESSION['editor'])){
    header("location:main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:main_login.php");
}
?>


<html>
<head>
    <script src="validation.js"></script>
    <title>Create Content Area:</title>
</head>

<body>

<form action="manageContentAreas.php">
    <input type="submit" value="Return To Manage Content Areas" />
</form>

<form id="createContent" method="post" action="../DataAccess/runCreateContent.php" onsubmit="return validateForm6()">

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value=""/>

    <p>Alias:
        <input id="Alias" name="Alias" type="text" maxlength="255" value=""/>

    <p>Order:
        <input id="Order" name="Order" type="text" maxlength="255" value=""/>

    <p>Description:
        <input id="Description" name="Description" type="text" size="100" maxlength="255" value=""/>

    <p><input id="submit" type="submit" name="submit" value="Create Content Area" />

</body>
</html>