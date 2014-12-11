<?php
session_start();

if(!isset($_SESSION['myusername'])){
    header("location:../Presentation/main_login.php");
}
if($_SESSION['editor'] == 0 && $_SESSION['allaccess'] == 0){
    header("location:../Presentation/main_login.php");
}

    include_once("../DataAccess/dbConnect.php");
    $db = dbConnect::getConnection();
    $templateid = mysqli_real_escape_string($db, $_POST['CSSID']);

    $query = "UPDATE CSSTemplates SET ActiveState = 0 WHERE ActiveState = 1";
    $result = mysqli_query($db, $query);

    $query = "UPDATE CSSTemplates SET ActiveState = 1 WHERE CSSTemplates_ID = '$templateid'";
    $result = mysqli_query($db, $query);
?>

<p>Successfully Activated <?php echo mysqli_affected_rows($db); ?> records.</p>
<a href="../Presentation/manageTemplates.php">Back to Manage CSS Templates page</a>


