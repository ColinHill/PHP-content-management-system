<?php
session_start();
/** @noinspection PhpDeprecationInspection */
if(!isset($_SESSION['myusername'])){
    header("location:main_login.php");
}
?>

<!DOCTYPE html>
<html>
<head>

    <?php
    include_once("../DataAccess/dbConnect.php");
    include_once("../BusinessClasses/article.php");
    include_once("../BusinessClasses/contentArea.php");
    include_once("../BusinessClasses/cssTemplate.php");
    include_once("../BusinessClasses/page.php");

    $currentPage = "Home";

    if(!empty ($_GET['page']))
    {
        $currentPage = $_GET['page'];
    }//end if

    $currentPage = Page::getPage($currentPage);
    $activeCSSTemplate = CSSTemplate::getActiveCSS();
    $pageArray = Page::getAllPages($currentPage);
    $areaArray = ContentArea::getContentArea();
    ?>

    <title><?php echo $currentPage->getName(); ?></title>
    <style type="text/css">
        <?php echo $activeCSSTemplate->getContent(); ?>
    </style>
</head>
<body>
<h1>
    <p>
        Welcome To The Admin Portal
    </p>
</h1>
<?php
if ($_SESSION['allaccess'] == 1){ ?>
    <h1>
        <p>
            You have full access.
        </p>
    </h1>
    <form action="manageArticles.php">
        <input type="submit" value="Manage Articles" />
    </form>
    <form action="manageContentAreas.php">
        <input type="submit" value="Manage Content Areas" />
    </form>
    <form action="managePages.php">
        <input type="submit" value="Manage Pages" />
    </form>
    <form action="manageTemplates.php">
        <input type="submit" value="Manage Templates" />
    </form>
    <form action="manageUsers.php">
        <input type="submit" value="Manage Users" />
    </form>
<?php } ?>

<?php
if ($_SESSION['admin'] == 1){ ?>
    <h1>
        <p>
            You have administrator access.
        </p>
    </h1>
    <form action="manageUsers.php">
        <input type="submit" value="Manage Users" />
    </form>
<?php } ?>

<?php
if ($_SESSION['editor'] == 1){ ?>
    <h1>
        <p>
            You have editor access.
        </p>
    </h1>
    <form action="manageArticles.php">
        <input type="submit" value="Manage Articles" />
    </form>
    <form action="manageContentAreas.php">
        <input type="submit" value="Manage Content Areas" />
    </form>
    <form action="managePages.php">
        <input type="submit" value="Manage Pages" />
    </form>
    <form action="manageTemplates.php">
        <input type="submit" value="Manage Templates" />
    </form>
<?php } ?>

<form action="logout.php">
    <input type="submit" value="Log Out" />
</form>

<form action="highchart.php">
    <input type="submit" value="Check out Articles chart!" />
</form>

</body>
</html>