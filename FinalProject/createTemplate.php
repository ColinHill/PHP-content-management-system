<?php

?>

<html>
<head>

    <title>  </title>

</head>

<body>

<form id="createUser" method="post" action="">

    <p>Template ID:
        <input id="CSSTemplates_ID" name="CSSTemplates_ID" type="text" maxlength="255" value="" readonly="readonly" />

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value=""/>

    <p>Description:
        <input id="Description" name="Description" type="text" maxlength="255" value=""/>

    <p>CSS Snippet:</p><p>
        <textarea form="createUser" name="CSSSnippet" cols="100" rows="20" maxlength="10000" wrap="soft" value=""></textarea>

    <p><input id=" " type="submit" name="submit" value="Update Template" />

</body>
</html>