<?php
use CMW\Utils\Utils;
use CMW\Model\Core\ThemeModel;
use CMW\Controller\Core\SecurityController;
use CMW\Utils\SecurityService;
use CMW\Controller\Users\UsersController;

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
            <div class="text-sm lg:text-lg mt-4"><?= ThemeModel::fetchConfigValue('home_description') ?></div>
            <div class="px-4 py-2 w-full sm:w-auto mt-4 text-4xl">
                <div class="flex-wrap inline-flex space-x-6 lg:space-x-16">
                <?php if(ThemeModel::fetchConfigValue('footer_active_facebook')): ?>
                <a href="<?= ThemeModel::fetchConfigValue('footer_link_facebook') ?>" <?php if(ThemeModel::fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                    <i class="<?= ThemeModel::fetchConfigValue('footer_icon_facebook') ?>"></i>
                </a>
                <?php endif; ?>
                <?php if(ThemeModel::fetchConfigValue('footer_active_twitter')): ?>
                <a href="<?= ThemeModel::fetchConfigValue('footer_link_twitter') ?>" <?php if(ThemeModel::fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                    <i class="<?= ThemeModel::fetchConfigValue('footer_icon_twitter') ?>"></i>
                </a>
                <?php endif; ?>
                <?php if(ThemeModel::fetchConfigValue('footer_active_instagram')): ?>
                <a href="<?= ThemeModel::fetchConfigValue('footer_link_instagram') ?>" <?php if(ThemeModel::fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                    <i class="<?= ThemeModel::fetchConfigValue('footer_icon_instagram') ?>"></i>
                </a>
                <?php endif; ?>
                <?php if(ThemeModel::fetchConfigValue('footer_active_discord')): ?>
                <a href="<?= ThemeModel::fetchConfigValue('footer_link_discord') ?>" <?php if(ThemeModel::fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                    <i class="<?= ThemeModel::fetchConfigValue('footer_icon_discord') ?>"></i>
                </a>
                <?php endif; ?>
                </div>
            </div>
            <div class="text-gray-500 mt-20 lg:mt-60">
                <div class="p-2 text-xs lg:text-base">
                    <p>Copyright © <?= ThemeModel::fetchConfigValue('footer_year') ?><br>Site créer par <b><a href="https://craftmywebsite.fr/" target="_blank">CraftMyWebsite</a></b> pour <b><?= Utils::getSiteName()?></b></p>
                    <p class="hidden">Credit thème : Z0mblard</p>
                </div>
            </div>
        </div>
    </div>
</div>