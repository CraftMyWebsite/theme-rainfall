<?php

use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Controller\Users\UsersController;
use CMW\Utils\Website;



/*TITRE ET DESCRIPTION*/
$title = Website::getWebsiteName() . ' - '. ThemeModel::fetchConfigValue('home_title');
$description = Website::getWebsiteDescription();
?>
<div style="background-image: url('<?= ThemeModel::fetchImageLink("home_background") ?>');" class="absolute img_bg w-screen h-screen ">

    <div class="layer flex">
        <div class="mx-auto my-auto lg:mt-28 text-center text-white">
            <img class="mx-auto mb-4 lg:mb-12 w-56" src="<?= ThemeModel::fetchImageLink("header_img_logo") ?>" alt="logo introuvable !">
            <div class="font-bold text-5xl lg:text-8xl mb-4"><?= Website::getWebsiteName() ?></div>
            <div class="text-sm lg:text-lg">Une super description pour mon site !</div>

            <div class="px-4 py-2 w-full sm:w-auto mt-4 text-4xl">
                <div class="flex-wrap inline-flex space-x-6">
                    <?php if(ThemeModel::fetchConfigValue('footer_active_facebook')): ?>
                        <a href="<?= ThemeModel::fetchConfigValue('footer_link_facebook') ?>" <?php if(ThemeModel::fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                            <i class=" <?= ThemeModel::fetchConfigValue('footer_icon_facebook') ?>"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(ThemeModel::fetchConfigValue('footer_active_twitter')): ?>
                        <a href="<?= ThemeModel::fetchConfigValue('footer_link_twitter') ?>" <?php if(ThemeModel::fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                            <i class=" <?= ThemeModel::fetchConfigValue('footer_icon_twitter') ?>"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(ThemeModel::fetchConfigValue('footer_active_instagram')): ?>
                        <a href="<?= ThemeModel::fetchConfigValue('footer_link_instagram') ?>" <?php if(ThemeModel::fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                            <i class=" <?= ThemeModel::fetchConfigValue('footer_icon_instagram') ?>"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(ThemeModel::fetchConfigValue('footer_active_discord')): ?>
                        <a href="<?= ThemeModel::fetchConfigValue('footer_link_discord') ?>" <?php if(ThemeModel::fetchConfigValue('footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                            <i class=" <?= ThemeModel::fetchConfigValue('footer_icon_discord') ?>"></i>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
