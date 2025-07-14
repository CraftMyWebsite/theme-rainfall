<?php

use CMW\Controller\Core\PackageController;
use CMW\Controller\Core\SecurityController;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;



/*TITRE ET DESCRIPTION*/
Website::setTitle(Website::getWebsiteName());
Website::setDescription(Website::getWebsiteDescription());
?>
<div data-cmw-style="background:home:home_background" style="background: no-repeat ;background-size: cover;" class="absolute img_bg w-screen h-screen ">

    <div class="layer flex">
        <div class="mx-auto my-auto lg:mt-28 text-center text-white">
            <img class="mx-auto mb-4 lg:mb-12 w-56" data-cmw-attr="src:global:header_img_logo" alt="logo">
            <div class="font-bold text-5xl lg:text-8xl mb-4"><?= Website::getWebsiteName() ?></div>
            <div data-cmw-visible="home:home_use_desc" data-cmw="home:home_desc" class="text-sm lg:text-lg"></div>

            <div class="px-4 py-2 w-full sm:w-auto mt-4 text-4xl">
                <div class="flex-wrap inline-flex space-x-6">
                        <a data-cmw-visible="home:footer_active_facebook" data-cmw-attr="href:home:footer_link_facebook" <?php if(ThemeModel::getInstance()->fetchConfigValue('home','footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                            <i data-cmw-class="home:footer_icon_facebook"></i>
                        </a>
                        <a data-cmw-visible="home:footer_active_twitter" data-cmw-attr="href:home:footer_link_twitter" <?php if(ThemeModel::getInstance()->fetchConfigValue('home','footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                            <i data-cmw-class="home:footer_icon_twitter"></i>
                        </a>
                        <a data-cmw-visible="home:footer_active_instagram" data-cmw-attr="href:home:footer_link_instagram" <?php if(ThemeModel::getInstance()->fetchConfigValue('home','footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                            <i data-cmw-class="home:footer_icon_instagram"></i>
                        </a>
                        <a data-cmw-visible="home:footer_active_discord" data-cmw-attr="href:home:footer_link_discord" <?php if(ThemeModel::getInstance()->fetchConfigValue('home','footer_open_link_new_tab')): ?>target="_blank"<?php endif; ?> class="hover:text-blue-600">
                            <i data-cmw-class="home:footer_icon_discord"></i>
                        </a>
                </div>
            </div>
            <?php if (PackageController::isInstalled('Newsletter')): ?>
                <?php if (ThemeModel::getInstance()->fetchConfigValue('')): ?>
                    <form data-cmw-visible="home-newsletter:newsletter_section_active" action="newsletter" method="post" class="p-8">
                        <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                        <p data-cmw="home-newsletter:newsletter_section_description"></p>
                        <div class="relative mb-6">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="text-gray-500 dark:text-gray-400 fa-solid fa-envelope"></i>
                            </div>
                            <input name="newsletter_users_mail" type="text" id="input-group-1"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="votre@mail.com">
                        </div>
                        <?php SecurityController::getPublicData(); ?>
                        <div class="mt-2 text-center">
                            <button data-cmw="home-newsletter:newsletter_section_button" type="submit"
                                    class=" px-3 py-2 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 dark:bg-blue-800 dark:hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                            </button>
                        </div>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
