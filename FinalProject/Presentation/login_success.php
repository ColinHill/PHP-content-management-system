
<?php
session_start();
/** @noinspection PhpDeprecationInspection */
if(!session_is_registered(myusername)){
    header("location:main_login.php");
}
?>

<html>
<body>
Login Successful
</body>
</html>