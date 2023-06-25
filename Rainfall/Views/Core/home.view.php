<?php

use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Controller\Users\UsersController;
use CMW\Utils\Website;



/*TITRE ET DESCRIPTION*/
$title = Website::getName() . ' - '. ThemeModel::fetchConfigValue('home_title');
$description = Website::getDescription();
?>

<div style="background-image: url('<?= ThemeModel::fetchImageLink("home_background") ?>');" class="absolute img_bg w-screen h-screen -z-10">
    <div class="layer flex">
        <div class="mx-auto my-auto lg:mt-28 text-center text-white">
            <img class="mx-auto mb-4 lg:mb-12 w-56" src="<?= ThemeModel::fetchImageLink("header_img_logo") ?>" alt="logo introuvable !">
            <div class="font-bold text-5xl lg:text-8xl">RainFall</div>
            <div class="text-sm lg:text-lg">Une super description pour mon site !</div>
            <div class="px-4 py-2 w-full sm:w-auto mt-4 text-4xl">
                <div class="flex-wrap inline-flex space-x-6 lg:space-x-16">
                    <a href="#" class="hover:text-blue-600">
                        <i class=" fa-brands fa-facebook"></i>
                    </a>
                    <a href="#" class="hover:text-blue-600">
                        <i class=" fa-brands fa-square-twitter"></i>
                    </a>
                    <a href="#" class="hover:text-blue-600">
                        <i class=" fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="hover:text-blue-600">
                        <i class=" fa-brands fa-discord"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
