<?php

?>

<html>
<head>
    <script src="validation.js"></script>
    <title>Create Article:</title>
</head>

<body>

<form action="manageArticles.php">
    <input type="submit" value="Return To Manage Articles" />
</form>

<form id="createArticle" method="post" action="runCreateArticles.php">

    <p>Name:
        <input id="Name" name="Name" type="text" maxlength="255" value=""/>

    <p>Title:
        <input id="Title" name="Title" type="text" maxlength="255" value=""/>

    <p>Description:
        <input id="Description" name="Description" type="text" size="100" maxlength="255" value=""/>

    <p>Page:<p>
        <input id="Page" name="Page" type="text" value=""/>

    <p>Content Area:</p>
    <p><select name="contentAreaDropDown" size="1" multiple="no">
            <option value="1">Header</option>
            <option value="2">Aside</option>
            <option value="3">Body</option>
            <option value="4">Footer</option>
        </select>

    <p><input type="radio" name="allPages" />

    <p>
        <textarea form="createArticle" name="HTMLSnippet" cols="100" rows="20" maxlength="10000" wrap="soft" value="">

        </textarea>

    <p><input id="submit" type="submit" name="submit" value="Create Article" />

</body>
</html>