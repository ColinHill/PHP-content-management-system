<?php

?>

<html>
<head>
    <title>Create Site Page:</title>
</head>

<body>

<form id="createPage" method="post" action="runCreatePage.php">

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value=""/>

    <p>Alias:
        <input id="Alias" name="Alias" type="text" maxlength="255" value=""/>

    <p>Description:
        <input id="Description" name="Description" type="text" size="100" maxlength="255" value=""/>

    <p><input id="submit" type="submit" name="submit" value="Create Site Page" />

</body>
</html>