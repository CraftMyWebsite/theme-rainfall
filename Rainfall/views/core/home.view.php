<?php
use CMW\Utils\Utils;
use CMW\Model\Core\ThemeModel;
use CMW\Controller\Core\SecurityController;
use CMW\Utils\SecurityService;
use CMW\Controller\Users\UsersController;

/*NEWS BASIC NEED*/
use CMW\Model\News\NewsModel;
$newsList = new NewsModel();
$newsList = $newsList->getSomeNews( ThemeModel::fetchConfigValue('news_number_display'), 'DESC');

/*CONTACT BASIC NEDD*/
use CMW\Model\Contact\ContactModel;

/*TITRE ET DESCRIPTION*/
$title = Utils::getSiteName() . ' - '. ThemeModel::fetchConfigValue('home_title');
$description = Utils::getSiteDescription();
?>
<div style="background-image: url('<?= getenv("PATH_SUBFOLDER") ?>public/uploads/Rainfall/bg.jpg');" class="absolute img_bg w-screen h-screen -z-10">
    <div class="layer flex">
        <div class="mx-auto my-auto lg:mt-28 text-center text-white">
            <img class="mx-auto mb-4 lg:mb-12 w-56" src="<?= getenv("PATH_SUBFOLDER") ?>public/uploads/Rainfall/logo.png" alt="logo.svg introuvable !">
            <div class="font-bold text-5xl lg:text-8xl"><?= Utils::getSiteName()?></div>
            <div class="text-sm lg:text-lg mt-4">Une super description pour mon site !</div>
            <div class="px-4 py-2 w-full sm:w-auto mt-4 text-4xl">
                <div class="flex-wrap inline-flex space-x-6 lg:space-x-16">
                    <!--TODO : Possibilité de le désactiver - Editer le lien-->
                    <a href="#" class="hover:text-blue-600">
                        <i class=" fa-brands fa-facebook"></i>
                    </a>
                    <!--TODO : Possibilité de le désactiver - Editer le lien dans les config du theme-->
                    <a href="#" class="hover:text-blue-600">
                        <i class=" fa-brands fa-square-twitter"></i>
                    </a>
                    <!--TODO : Possibilité de le désactiver - Editer le lien dans les config du theme-->
                    <a href="#" class="hover:text-blue-600">
                        <i class=" fa-brands fa-instagram"></i>
                    </a>
                    <!--TODO : Possibilité de le désactiver - Editer le lien dans les config du theme-->
                    <a href="#" class="hover:text-blue-600">
                        <i class=" fa-brands fa-discord"></i>
                    </a>
                </div>
            </div>
            <div class="text-gray-500 mt-20 lg:mt-60">
                <div class="p-2 text-xs lg:text-base">
                    <p>Copyright © 2022<br>Site créer par <b><a href="https://craftmywebsite.fr/" target="_blank">CraftMyWebsite</a></b> pour <?= Utils::getSiteName()?></p>
                    <p class="hidden">Credit thème : Z0mblard</p>
                </div>
            </div>
        </div>
    </div>
</div>