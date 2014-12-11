<?php
session_start();

if(!isset($_SESSION['myusername'])){
    header("location:main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['author'] == 0 && $_SESSION['allaccess']){
    header("location:main_login.php");
}
?>

<html>
<head>
    <script src="validation.js"></script>
    <title>Create Site Page:</title>
</head>

<body>

<form action="managePages.php">
    <input type="submit" value="Return To Manage Pages" />
</form>

<form id="createPage" method="post" onsubmit="return validateForm()" action="../BusinessScripts/runCreatePage.php">

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value=""/>

    <p>Alias:
        <input id="Alias" name="Alias" type="text" maxlength="255" value=""/>

    <p>Description:
        <input id="Description" name="Description" type="text" size="100" maxlength="255" value=""/>

    <p><input id="submit" type="submit" name="submit" value="Create Site Page" />

</body>
</html>