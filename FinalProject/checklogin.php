<?php
session_start();
ob_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="inet2005"; // Mysql password
$db_name="CMSTestDB"; // Database name
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

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
    $_SESSION['myusername'] = $myusername;
    $_SESSION['mypassword'] = $mypassword;
    header("location:index.php");
}
else {
    echo "Wrong Username or Password";
}
ob_end_flush();
?>
