<?php

use CMW\Controller\Core\CoreController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Uploads\ImagesManager;
use CMW\Manager\Views\View;
use CMW\Utils\Website;

/* @var \CMW\Controller\Core\CoreController $core */
/* @var string $title */
/* @var string $description */
/* @var array $includes */

$siteName = Website::getWebsiteName();
?>

<!DOCTYPE html>
<html lang="<?= EnvManager::getInstance()->getValue('LOCALE') ?>">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta property="og:title" content=<?= $siteName ?>>
    <meta property="og:site_name" content="<?= $siteName ?>">
    <meta property="og:description" content="<?= Website::getDescription() ?>">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?= EnvManager::getInstance()->getValue('PATH_URL') ?>">

    <title><?= Website::getTitle() ?></title>
    <meta name="description" content="<?= Website::getDescription() ?>">

    <meta name="author" content="CraftMyWebsite, <?= $siteName ?>">
    <meta name="publisher" content="<?= $siteName ?>">
    <meta name="copyright" content="CraftMyWebsite, <?= $siteName ?>">
    <meta name="robots" content="follow, index, all"/>

    <?= ImagesManager::getFaviconInclude() ?>

    <?php
    View::loadInclude($includes, "styles");
    ?>

    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Rainfall/Assets/Css/style.css">
    <link rel="stylesheet" href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Admin/Resources/Vendors/Fontawesome-free/Css/fa-all.min.css">
    <script src="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Themes/Rainfall/Assets/Js/flowbite.js"></script>

</head>

<body style="background-color: #1e293b" class=" w-full text-white flex flex-col min-h-screen">
<?php
View::loadInclude($includes, "beforeScript");
echo CoreController::getInstance()->cmwWarn();
?>
