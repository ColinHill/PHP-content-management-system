<!DOCTYPE html>
<html>
<head>

    <?php
    include_once("../DataAccess/dbConnect.php");
    include_once("../BusinessClasses/article.php");
    include_once("../BusinessClasses/contentArea.php");
    include_once("../BusinessClasses/cssTemplate.php");
    include_once("../BusinessClasses/page.php");

    session_start();


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

<?php
if (isset($_SESSION['author'])){


        if ($_SESSION['author'] == 1){ ?>
            <h1>
                <p>
                    You have author access.
                </p>
            </h1>
            <form action="authorManageArticles.php">
                <input type="submit" value="Manage Articles" />
            </form>
            <form action="authorManagePages.php">
                <input type="submit" value="Manage Pages" />
            </form>
            <form action="logout.php">
                <input type="submit" value="Log Out" />
            </form>
        <?php } }

if (!isset($_SESSION['author'])){ ?>

<form action="main_login.php">
    <input type="submit" value="Log In" />
</form>

<?php } ?>


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