<html>
<head>

    <title>Update User</title>

</head>

<body>

<form id="updateUser" method="post" action="runUpdateUser.php">

    <p>User ID:
        <input id="User_ID" name="User_ID" type="text" maxlength="255" value="" readonly="readonly" />

    <p>First Name:
        <input id="first_name" name="first_name" type="text" maxlength="255" value=""/>

    <p>Last Name:
        <input id="last_name" name="last_name" type="text" maxlength="255" value=""/>

    <p>Username:
        <input id="user_name" name="user_name" type="text" maxlength="255" value=""/>

    <p>Password:
        <input id="password" name="password" type="text" maxlength="255" value=""/>

    <p>Salt:
        <input id="salt" name="salt" type="text" maxlength="255" value=""/>

    <p>Privileges:

    <p>	<input id="Administrator" name="Administrator" class="element checkbox" type="checkbox" value="0" />
        Administrator

    <p> <input id="Editor" name="Editor" class="element checkbox" type="checkbox" value="0" />
        Editor

    <p> <input id="Author" name="Author" class="element checkbox" type="checkbox" value="0" />
        Author

    <p><input id=" " type="submit" name="submit" value="Update User" />

</body>
</html>