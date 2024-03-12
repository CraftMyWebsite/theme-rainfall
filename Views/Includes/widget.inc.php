<?php use CMW\Model\Core\ThemeModel;
use CMW\Model\Users\UsersModel;

?>

<div class="h-fit">
    <?php if (ThemeModel::getInstance()->fetchConfigValue('widgets_show_discord')): ?>
        <div class="w-full shadow-md mb-6">
            <div class="">
                <iframe style="width: 100%"
                        src="https://discord.com/widget?id=<?= ThemeModel::getInstance()->fetchConfigValue('widgets_content') ?>&theme=dark"
                        height="300" allowtransparency="true"
                        sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
            </div>
        </div>
    <?php endif; ?>
    <?php if (ThemeModel::getInstance()->fetchConfigValue('widgets_show_custom_1')): ?>
        <div style="background-color: #18202E !important;" class="w-full rounded-lg shadow mb-6">
            <div class="flex py-4 border-b">
                <div
                        class="px-4 font-bold"><?= ThemeModel::getInstance()->fetchConfigValue('widgets_custom_title_1') ?></div>
            </div>
            <div class="px-2 py-4">
                <?= ThemeModel::getInstance()->fetchConfigValue('widgets_custom_text_1') ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (ThemeModel::getInstance()->fetchConfigValue('widgets_show_custom_2')): ?>
        <div style="background-color: #18202E !important;" class="w-full rounded-lg shadow mb-6">
            <div class="flex py-4 border-b">
                <div
                        class="px-4 font-bold"><?= ThemeModel::getInstance()->fetchConfigValue('widgets_custom_title_2') ?></div>
            </div>
            <div class="px-2 py-4">
                <?= ThemeModel::getInstance()->fetchConfigValue('widgets_custom_text_2') ?>
            </div>
        </div>
    <?php endif; ?>
</div>