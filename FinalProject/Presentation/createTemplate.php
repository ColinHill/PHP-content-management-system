<?php
session_start();

if(!isset($_SESSION['myusername'])){
    header("location:main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:main_login.php");
}
?>

<html>
<head>
    <script src="validation.js"></script>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
    <title>Create Template:</title>

</head>

<body>

<form action="manageTemplates.php">
    <input type="submit" value="Return To Manage Templates" />
</form>

<form id="createTemplate" method="post" onsubmit="return validateForm8()" action="../BusinessScripts/runCreateTemplate.php">

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value=""/>

    <p>Description:
        <input id="Description" name="Description" type="text" maxlength="255" size ="100" value=""/>

    <p>CSS Snippet:</p><p>
       <textarea form="createTemplate" name="CSSSnippet"></textarea>

    <p><input id="submit" type="submit" name="submit" value="Create Template" />

</body>
</html>