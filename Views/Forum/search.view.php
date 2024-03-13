<?php

use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Users\UsersModel;
use CMW\Utils\Website;

/** @var \CMW\Entity\Forum\ForumTopicEntity[] $results */
/* @var CMW\Model\Forum\ForumResponseModel $responseModel */

Website::setTitle("Forum");
Website::setDescription("Recherchez un sujet dans le forum");
?>

<div class="bg-[#18202E] w-full pt-14 pb-4">
    <div
        class="text-center pt-4 font-extrabold text-4xl border-t border-gray-500"><?= ThemeModel::getInstance()->fetchConfigValue('forum_title') ?></div>
</div>
<div class="custom-shape-divider-top-1667065406">
    <svg width="100%" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
         preserveAspectRatio="none" class="bg-[#1e293b] text-[#18202E] h-2 lg:h-10">
        <path
            d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
            opacity=".25" class="shape-fill"></path>
        <path
            d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
            opacity=".5" class="shape-fill"></path>
        <path
            d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
            class="shape-fill"></path>
    </svg>
</div>

<section class="px-4 lg:px-16 py-6">
    <?php if (ThemeModel::getInstance()->fetchConfigValue('widget_use_forum')): ?>
    <div class="lg:grid lg:grid-cols-5 gap-6">
        <div>
            <?php include_once("Public/Themes/Rainfall/Views/Includes/widget.inc.php"); ?>
        </div>
        <?php endif; ?>
        <section
            class="bg-[#18202E] rounded-lg shadow h-fit mx-2 <?php if (!ThemeModel::getInstance()->fetchConfigValue('widget_use_forum')): ?>lg:mx-72<?php endif; ?> col-span-4">
            <section>

                <section class="lg:grid grid-cols-4 gap-6 p-6">
                    <div class="col-span-3">
                        <p>Résultat pour : <span class="font-bold"><?= $for ?></span></p>
                    </div>
                    <div class="flex">
                        <div class="relative w-full">
                            <form action="/forum/search" method="POST">
                                <?php (new SecurityManager())->insertHiddenToken() ?>
                                <input type="text" name="for"
                                       class="block p-1 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="Rechercher">
                                <button type="submit"
                                        class="absolute top-0 right-0 p-1 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                    </div>
                </section>

                <section
                    class="<?php if (ThemeModel::getInstance()->fetchConfigValue('forum_use_widgets')): ?>lg:grid <?php endif; ?> grid-cols-4 gap-6 px-6">
                    <div class="lg:col-span-3 h-fit">
                        <?php if (empty($results)): ?>
                            <div>
                                <h1 class="font-extrabold mb-4 text-xl md:text-6xl">Nous n'avons rien trouvé !</h1>
                            </div>

                        <?php else: ?>
                            <div class="w-full shadow-md">
                                <div
                                    class="flex py-4 bg-gray-100 bg-gray-800 text-gray-300 rounded-t-lg shadow">
                                    <div class="md:w-[25%] px-4 font-bold">Topics</div>
                                    <div class="hidden md:block w-[40%] font-bold text-center">Contenue</div>
                                    <div class="hidden md:block w-[10%] font-bold text-center">Réponses</div>
                                    <div class="hidden md:block w-[25%] font-bold text-center">Posté par</div>
                                </div>
                                <?php foreach ($results as $result): ?>
                                    <div
                                        class="relative flex py-2 border-t text-gray-300 bg-gray-700 hover:bg-gray-500">
                                        <div class="md:w-[25%] px-5 relative">
                                            <a class="flex flex-wrap hover:text-blue-400"
                                               href="<?= $result->getLink() ?>">
                                                <div class="">
                                                    <p><?php if ($result->getPrefixId()): ?><span
                                                            class="px-2 text-white rounded-lg"
                                                            style="color: <?= $result->getPrefixTextColor() ?>; background: <?= $result->getPrefixColor() ?>"><?= $result->getPrefixName() ?></span> <?php endif; ?>
                                                        <?= mb_strimwidth($result->getName(), 0, 65, '...') ?>
                                                        <?= $result->isImportant() ? "
                            <i data-tooltip-target='tooltip-important' class='<?= $iconImportant ?> fa-sm text-orange-500'></i>
                            <span id='tooltip-important' role='tooltip' class='absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg'>
                                Important
                            </span>
                            " : "" ?>
                                                        <?= $result->isPinned() ? "
                            <i data-tooltip-target='tooltip-pined' class='<?= $iconPin ?> fa-sm text-red-600 ml-2'></i>
                            <span id='tooltip-pined' role='tooltip' class='absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg'>
                                Épinglé
                            </span>
                             " : "" ?>
                                                        <?= $result->isDisallowReplies() ? "
                            <i data-tooltip-target='tooltip-closed' class='<?= $iconClosed ?> fa-sm text-yellow-300 ml-2'></i>
                            <span id='tooltip-closed' role='tooltip' class='absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg'>
                                Fermé
                            </span>
                             " : "" ?>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                        <div
                                            class="hidden md:block w-[40%] text-center my-auto"><?= mb_strimwidth($result->getContent(), 0, 150, '...') ?></div>
                                        <div
                                            class="hidden md:inline-block w-[10%] text-center my-auto"><?= $responseModel->countResponseInTopic($result->getId()) ?></div>
                                        <div class="hidden md:block w-[25%] my-auto">
                                            <div class="flex text-sm">
                                                <a href="#">
                                                    <div tabindex="0" class="avatar w-10">
                                                        <div class="w-fit">
                                                            <img
                                                                src="<?= $result->getUser()->getUserPicture()->getImage() ?>"/>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="ml-2">
                                                        <div class=""><?= $result->getUser()->getPseudo() ?></div>
                                                        <div><?= $result->getCreated() ?></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>

                    <?php if (ThemeModel::getInstance()->fetchConfigValue('forum_use_widgets')): ?>
                        <div class="h-fit">
                            <?php if (ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_stats')): ?>
                                <div class="w-full shadow-md mb-6">
                                    <div
                                        class="flex py-4 bg-gray-800 text-gray-300 rounded-t-lg shadow">
                                        <div class="px-4 font-bold">Stats forum</div>
                                    </div>
                                    <div class="px-2 py-4  bg-gray-700">
                                        <?php if (ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_member')): ?>
                                            <p><?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_member') ?>
                                            <b><?= UsersModel::getInstance()->countUsers() ?></b></p><?php endif; ?>
                                        <?php if (ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_messages')): ?>
                                            <p><?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_messages') ?>
                                            <b><?= $forumModel->countAllMessagesInAllForum() ?></b></p><?php endif; ?>
                                        <?php if (ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_topics')): ?>
                                            <p><?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_text_topics') ?>
                                            <b><?= $forumModel->countAllTopicsInAllForum() ?></b></p><?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_discord')): ?>
                                <div class="w-full shadow-md mb-6">
                                    <div class="">
                                        <iframe style="width: 100%"
                                                src="https://discord.com/widget?id=<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_content') ?>&theme=dark"
                                                height="400" allowtransparency="true"
                                                sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (ThemeModel::getInstance()->fetchConfigValue('forum_widgets_show_custom')): ?>
                                <div class="w-full shadow-md mb-6">
                                    <div
                                        class="flex py-4 bg-gray-800 text-gray-300 rounded-t-lg shadow">
                                        <div
                                            class="px-4 font-bold"><?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_custom_title') ?></div>
                                    </div>
                                    <div class="px-2 py-4 bg-gray-700">
                                        <?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_custom_text') ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </section>
            </section>
        <?php if (ThemeModel::getInstance()->fetchConfigValue('widget_use_forum')): ?></div><?php endif; ?>
</section>