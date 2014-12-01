<?php

?>

<html>
<head>

    <title>Create Template:</title>

</head>

<body>

<form id="createTemplate" method="post" action="runCreateTemplate.php">

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value=""/>

    <p>Description:
        <input id="Description" name="Description" type="text" maxlength="255" value=""/>

    <p>CSS Snippet:</p><p>
        <input id="CSSSnippet" name="CSSSnippet" type="text" maxlength="10000" cols="100" rows="20" wrap="soft" value=""/>

    <p><input id=" " type="submit" name="submit" value="Create Template" />

</body>
</html>

<!--<textarea form="createUser" name="CSSSnippet" cols="100" rows="20" maxlength="10000" wrap="soft" value=""></textarea>-->