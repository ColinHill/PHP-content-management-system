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
    include_once ("dbConnect.php");
    include_once ("article.php");
    include_once ("contentArea.php");
    include_once ("cssTemplate.php");
    include_once ("page.php");

    $currentPage = "Home";

    if(!empty ($_GET['page']))
    {
        $currentPage = $_GET['page'];
    }//end if

    $currentPage = Page::getPage($currentPage);
    $activeCSSTemplate = CSSTemplate::getActiveCSS();
    $pageArray = Page::getAllPages($currentPage);
    $areaArray = ContentArea::getContentArea();

    // WARNING: PSEUDO_CODE ONLY
    // this may be a presentation page in 3-tier or a view in MVC
    // I am doing a bit too much echoing HTML (li tags, etc.) but wanted to simplify

    // FIND OUT WHAT PAGE WE ARE ON
    // obtain/receive the current page ($currentPage)
    // using GET from the nav or if none then default page

    // FIND OUT WHAT STYLE TEMPLATE WE ARE USING
    // obtain/receive the active style/template ($currentTemplate)
    ?>
    <title><?php echo $currentPage->getName(); ?></title>
    <style type="text/css">
        <?php echo $activeCSSTemplate->getContent(); ?>
    </style>
</head>
<body>

<?php
if ($_SESSION['allaccess'] == 1){ ?>
    <form action="manageArticles.php">
        <input type="submit" value="Manage Articles" />
    </form>
    <form action="manageContentAreas.php">
        <input type="submit" value="Manage Users" />
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
    <form action="manageUsers.php">
        <input type="submit" value="Manage Users" />
    </form>
<?php } ?>

<?php
if ($_SESSION['editor'] == 1){ ?>
    <form action="manageArticles.php">
        <input type="submit" value="Manage Articles" />
    </form>
    <form action="manageContentAreas.php">
        <input type="submit" value="Manage Users" />
    </form>
    <form action="managePages.php">
        <input type="submit" value="Manage Pages" />
    </form>
    <form action="manageTemplates.php">
        <input type="submit" value="Manage Templates" />
    </form>
<?php } ?>

<form action="index.php">
    <input type="submit" value="Log Out" />
</form>

<header>
    <h1><?php echo $currentPage->getName(); ?></h1>
</header>
<nav>
    <ul>
        <?php foreach ($pageArray as $page): ?>
            <li>
                <a href="index.php?page=<?php echo $page->getAlias(); ?>">
                    <?php echo $page->getName(); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<section>

    <?php foreach($areaArray as $area): ?>

        <?php $articleArray = article::getArticle($area->getID(), $currentPage->getID()); ?>

        <div id="<?php echo $area->getAlias(); ?>">

            <?php foreach($articleArray as $article): ?>

                <article id="<?php echo $article->getName(); ?>">

                    <?php echo $article->getContent(); ?>

                </article>

            <?php endforeach; ?>

        </div>

    <?php endforeach; ?>

</section>
</body>
</html>