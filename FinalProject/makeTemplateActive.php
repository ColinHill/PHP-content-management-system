<?php
    include_once ("dbConnect.php");
    $db = dbConnect::getConnection();
    $templateid = $_POST['CSSID'];

    $query = "UPDATE CSSTemplates SET ActiveState = 0 WHERE ActiveState = 1";
    $result = mysqli_query($db, $query);

    $query = "UPDATE CSSTemplates SET ActiveState = 1 WHERE CSSTemplates_ID = '$templateid'";
    $result = mysqli_query($db, $query);
?>

<p>Successfully Activated <?php echo mysqli_affected_rows($db); ?> records.</p>
<a href="manageTemplates.php">Back to Manage CSS Templates page</a>


