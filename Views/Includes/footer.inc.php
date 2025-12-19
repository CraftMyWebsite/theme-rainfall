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
        <p>Copyright © <?= date('Y') ?><br>Site créé par <b><a href="https://craftmywebsite.fr/" target="_blank">CraftMyWebsite</a></b> pour <?= Website::getWebsiteName() ?></p>
        <p class="hidden">Credit thème : Z0mblard</p>
    </div>
        <div data-cmw-visible="footer:footer_active_condition" class="px-6 md:flex-1">
            <span data-cmw="footer:footer_title_condition"></span><br>
                <b><a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>all_terms" data-cmw="footer:footer_desc_condition_use"></a></b>
        </div>
</div>
</html>

<?php
View::loadInclude($includes, "afterScript");
?>
