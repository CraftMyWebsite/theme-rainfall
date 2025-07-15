<?php

use CMW\Controller\Users\UsersController;
use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

$newsList = \CMW\Model\News\NewsModel::getInstance()->getSomeNews(ThemeModel::getInstance()->fetchConfigValue('news','news_page_number_display'), 'DESC');

/*TITRE ET DESCRIPTION*/
Website::setTitle(ThemeModel::getInstance()->fetchConfigValue('news','news_page_title'));
Website::setDescription(ThemeModel::getInstance()->fetchConfigValue('news','news_page_desc'));
?>

<div style="background-color: #18202E !important;" class="w-full pt-14 pb-4">
    <div class="text-center pt-4 font-bold text-4xl border-t border-gray-500" data-cmw="news:news_page_title"></div>
</div>
<div class="custom-shape-divider-top-1667065406">
    <svg width="100%" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
         preserveAspectRatio="none" class="h-2 lg:h-10" style="background-color: #1e293b !important; color: #18202E;">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
              opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
              opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
              class="shape-fill"></path>
    </svg>
</div>

<section class="px-4 lg:px-16 py-6">


    <?php if (ThemeModel::getInstance()->fetchConfigValue('widget','widget_use_news_list')): ?>
    <div class="lg:grid lg:grid-cols-5 gap-6">
        <div>
            <?php include_once("Public/Themes/Rainfall/Views/Includes/widget.inc.php"); ?>
        </div>
        <?php endif; ?>


        <div class="lg:grid lg:grid-cols-2 col-span-4 <?php if (!ThemeModel::getInstance()->fetchConfigValue('widget','widget_use_news_list')): ?>lg:mx-72<?php endif; ?> gap-6 mt-4 lg:mt-0 h-fit">
            <?php foreach ($newsList as $news): ?>
            <div style="background-color: #18202E !important;"
                 class="mb-4 lg:mb-0 flex flex-wrap h-full overflow-hidden rounded-md shadow-lg">
                <div class="w-full md:w-5/12 lg:w-full xl:w-5/12">
                    <div class="h-full relative">
                        <img src="<?= $news->getImageLink() ?>"
                             class="h-full object-cover w-full" alt="..." width="240" height="260"/>
                        <div class="absolute bg-blue-600 font-semibold leading-tight left-0 ml-3 mt-3 px-3 py-2 text-center top-0">
                            <div class="text-sm"><?= $news->getAuthor()->getPseudo() ?></div>
                        </div>
                    </div>
                </div>
                <div class="px-8 py-6 w-full md:w-7/12 lg:w-full xl:w-7/12">
                    <div class="mb-3">
                        <div class="bg-gray-500 font-medium inline-block px-3 py-1 rounded-sm text-xs uppercase">
                            <?= $news->getDateCreated() ?>
                        </div>
                    </div>
                    <h3 class="font-bold leading-tight mb-3 text-xl">
                        <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>news/<?= $news->getSlug() ?>" class="hover:text-blue-600"><?= $news->getTitle() ?></a></h3>
                    <p class="mb-3"><?= $news->getDescription() ?></p>
                    <div class="mt-6 flex justify-between">
                        <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>news/<?= $news->getSlug() ?>" class="font-bold hover:text-blue-700 text-sm">Lire la suite <i
                                class="fa-solid fa-caret-right"></i></a>
                        <div class="cursor-pointer">
                                <span data-tooltip-target="<?php if ($news->getLikes()->userCanLike()) {echo "tooltip-liked";} else {echo "tooltip-like";} ?>">
                                <span class="text-base"><?= $news->getLikes()->getTotal() ?>
                                    <?php if ($news->getLikes()->userCanLike()): ?>
                                        <a href="#"><i class="fa-solid fa-heart"></i></a>
                                        <div id="tooltip-liked" role="tooltip" class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        <?php if(UsersController::isUserLogged()) {echo "Vous aimez déjà !";} else {echo "Connectez-vous pour aimé !";} ?>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <?php else: ?>
                                        <a href="<?= $news->getLikes()->getSendLike() ?>"><i class="fa-regular fa-heart"></i></a>
                                        <div id="tooltip-like" role="tooltip" class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        Merci pour votre soutien !
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <?php endif; ?>
                                </span>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if (ThemeModel::getInstance()->fetchConfigValue('widget','widget_use_news_list')): ?></div><?php endif; ?>
</section>
