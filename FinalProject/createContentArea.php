<?php

?>

<html>
<head>
    <title>Create Content Area:</title>
</head>

<body>

<form id="createContent" method="post" action="runCreateContent.php">

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