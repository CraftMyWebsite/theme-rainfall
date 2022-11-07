<?php 
use CMW\Model\Core\ThemeModel;
use CMW\Controller\Users\UsersController;
/*NEWS BASIC NEED*/
use CMW\Model\News\NewsModel;
$newsListWidget = new NewsModel();
$newsListWidget = $newsListWidget->getSomeNews( ThemeModel::fetchConfigValue('widget_last_news_number_display'), 'DESC');

?>
<div style="background-color: <?= ThemeModel::fetchConfigValue('secondaryColor') ?> !important;" class="container mx-auto rounded-md shadow-lg p-4 h-fit">
    <div class="flex flex-no-wrap justify-center items-center py-4 -mb-6">
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::fetchConfigValue('widget_title') ?></h2>
        </div>
    </div>

<?php if(ThemeModel::fetchConfigValue('widget_last_news_active')): ?>
    <div class="font-medium text-gray-500 mt-6 cursor-default"><?= ThemeModel::fetchConfigValue('widget_last_news_title') ?></div>
    <?php foreach ($newsListWidget as $news): ?>
    <div style="background-color: <?= ThemeModel::fetchConfigValue('primaryColor') ?> !important;" class="h-full overflow-hidden rounded-md shadow-lg mb-2">
        <div class="p-2 w-full">
            <div class="font-bold leading-tight mb-2 text-xl">
                <a href="news/<?= $news->getSlug() ?>" class="hover:text-blue-600"><?= $news->getTitle() ?></a>
            </div>
            <p><?= $news->getDescription() ?></p>
            <div class="mt-2 flex justify-between">
                <a href="news/<?= $news->getSlug() ?>" class="font-bold hover:text-blue-700 text-sm">Lire la suite <i class="fa-solid fa-caret-right"></i></a>
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
<?php endif; ?>

<?php if(ThemeModel::fetchConfigValue('widget_discord_active')): ?>
    <div class="font-medium text-gray-500 mt-6 cursor-default"><?= ThemeModel::fetchConfigValue('widget_discord_title') ?></div>
    <iframe class="w-full" src="<?= ThemeModel::fetchConfigValue('widget_discord_link') ?>" height="300" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
<?php endif; ?>

<?php if(ThemeModel::fetchConfigValue('widget_custom_active_1')): ?>
    <div>
        <div class="font-medium text-gray-500 mt-6 cursor-default"><?= ThemeModel::fetchConfigValue('widget_custom_title_1') ?></div>
        <div style="background-color: <?= ThemeModel::fetchConfigValue('primaryColor') ?> !important;" class="flex flex-wrap h-full overflow-hidden rounded-md shadow-lg">
            <div class="p-2"><?= ThemeModel::fetchConfigValue('widget_custom_content_1') ?></div>
        </div>
    </div>
<?php endif; ?>

<?php if(ThemeModel::fetchConfigValue('widget_custom_active_2')): ?>
    <div>
        <div class="font-medium text-gray-500 mt-6 cursor-default"><?= ThemeModel::fetchConfigValue('widget_custom_title_2') ?></div>
        <div style="background-color: <?= ThemeModel::fetchConfigValue('primaryColor') ?> !important;" class="flex flex-wrap h-full overflow-hidden rounded-md shadow-lg">
            <div class="p-2"><?= ThemeModel::fetchConfigValue('widget_custom_content_2') ?></div>
        </div>
    </div>
<?php endif; ?>

<?php if(ThemeModel::fetchConfigValue('widget_custom_active_3')): ?>
    <div>
        <div class="font-medium text-gray-500 mt-6 cursor-default"><?= ThemeModel::fetchConfigValue('widget_custom_title_3') ?></div>
        <div style="background-color: <?= ThemeModel::fetchConfigValue('primaryColor') ?> !important;" class="flex flex-wrap h-full overflow-hidden rounded-md shadow-lg">
            <div class="p-2"><?= ThemeModel::fetchConfigValue('widget_custom_content_3') ?></div>
        </div>
    </div>
<?php endif; ?>

<?php if(ThemeModel::fetchConfigValue('widget_custom_active_4')): ?>
    <div>
        <div class="font-medium text-gray-500 mt-6 cursor-default"><?= ThemeModel::fetchConfigValue('widget_custom_title_4') ?></div>
        <div style="background-color: <?= ThemeModel::fetchConfigValue('primaryColor') ?> !important;" class="flex flex-wrap h-full overflow-hidden rounded-md shadow-lg">
            <div class="p-2"><?= ThemeModel::fetchConfigValue('widget_custom_content_4') ?></div>
        </div>
    </div>
<?php endif; ?>
</div>