<?php use CMW\Controller\Core\CoreController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Views\View;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/** @var CoreController $core */
/**@var  array $includes*/?>

</body>

<div class="flex justify-between text-gray-400 mt-auto p-2 " style="z-index: 50">
    <div class=" text-xs lg:text-base">
        <p>Copyright © 2022<br>Site créer par <b><a href="https://craftmywebsite.fr/" target="_blank">CraftMyWebsite</a></b> pour <?= Website::getWebsiteName() ?></p>
        <p class="hidden">Credit thème : Z0mblard</p>
    </div>
    <?php if(ThemeModel::getInstance()->fetchConfigValue('footer_active_condition')): ?>
        <div class="px-6 md:flex-1">
            <p><?= ThemeModel::getInstance()->fetchConfigValue('footer_title_condition') ?><br>
                <b><a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>cgu"><?= ThemeModel::getInstance()->fetchConfigValue('footer_desc_condition_use') ?></a></b>
                /
                <b><a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>cgv"><?= ThemeModel::getInstance()->fetchConfigValue('footer_desc_condition_sale') ?></a></b>
            </p>
        </div>
    <?php endif; ?>
</div>
</html>

<?php
View::loadInclude($includes, "afterScript");
?>
