<?php use CMW\Model\Core\ThemeModel;

?>

<div data-cmw-visible="widget:widgets_show_discord" class="h-fit">
        <div class="w-full shadow-md mb-6">
            <div class="">
                <iframe style="width: 100%"
                        src="https://discord.com/widget?id=<?= ThemeModel::getInstance()->fetchConfigValue('widget','widgets_content_id') ?>&theme=dark"
                        height="300" allowtransparency="true"
                        sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
            </div>
        </div>
        <div data-cmw-visible="widget:widgets_show_custom_1" style="background-color: #18202E !important;" class="w-full rounded-lg shadow mb-6">
            <div class="flex py-4 border-b">
                <div
                        class="px-4 font-bold" data-cmw="widget:widgets_custom_title_1"></div>
            </div>
            <div class="px-2 py-4" data-cmw="widget:widgets_custom_text_1">
            </div>
        </div>
        <div data-cmw-visible="widget:widgets_show_custom_2" style="background-color: #18202E !important;" class="w-full rounded-lg shadow mb-6">
            <div class="flex py-4 border-b">
                <div
                        class="px-4 font-bold" data-cmw="widget:widgets_custom_title_2"></div>
            </div>
            <div class="px-2 py-4" data-cmw="widget:widgets_custom_text_2">
            </div>
        </div>
</div>