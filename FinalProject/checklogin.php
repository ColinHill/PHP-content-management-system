<?php
session_start();
ob_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="inet2005"; // Mysql password
$db_name="CMSTestDB2"; // Database name
$tbl_name="Users"; // Table name

// Connect to server and select database.
mysql_connect("$host","$username","$password") OR die("Cannot connect");
mysql_select_db("$db_name") OR die("Cannot select DB");

//include_once("dbConnect.php");
//$db = dbConnect::getConnection();

// Define $myusername and $mypassword
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($_POST['myusername']);
$mypassword = mysql_real_escape_string($_POST['mypassword']);
$sql="SELECT * FROM Users WHERE user_name='$myusername' AND password='$mypassword'";
$result=mysql_query($sql);

$row = mysql_fetch_assoc($result);
$userid = $row['User_ID'];

$query = "SELECT * FROM Privileges WHERE Users_User_ID = '$userid'";
$result = mysql_query($query);

$row = mysql_fetch_assoc($result);
$admin = $row['Administrator'];
$editor = $row['Editor'];

if($admin ==1 && $editor ==1)
{
    $count = 3;
}

else if ($admin == 1)
{
    $count = 1;
}

else if ($editor == 1)
{
    $count = 2;
}

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==3){

// Register $myusername, $mypassword and redirect to file "login_success.php"
    $_SESSION['myusername'] = $myusername;
    $_SESSION['mypassword'] = $mypassword;
    $_SESSION['allaccess'] = 1;
    header("location:admin.php");
}

else if ($count == 1)
{
    $_SESSION['myusername'] = $myusername;
    $_SESSION['mypassword'] = $mypassword;
    $_SESSION['admin'] = 1;
    header("location:admin.php");
}

else if ($count == 2)
{
    $_SESSION['myusername'] = $myusername;
    $_SESSION['mypassword'] = $mypassword;
    $_SESSION['editor'] = 1;
    header("location:admin.php");
}

else {
    echo "Wrong Username or Password";
}
ob_end_flush();
?>
