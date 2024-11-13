<?php

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Users\UsersModel;
use CMW\Utils\Website;

/** @var \CMW\Model\Forum\ForumModel $forumModel */
/** @var \CMW\Entity\Forum\ForumCategoryEntity $category */

Website::setTitle("Forum");
Website::setDescription("Consulter les catégorie du Forum");
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
            <section class="lg:grid grid-cols-4 gap-6 p-6">
                <div class="col-span-3">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1">
                            <li class="inline-flex items-center">
                                <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>forum"
                                   class="inline-flex items-center text-sm font-medium hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <?= ThemeModel::getInstance()->fetchConfigValue('forum_breadcrumb_home') ?>
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    <a href="<?= $category->getLink() ?>"
                                       class="ml-1 text-sm font-medium hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $category->getName() ?></a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="flex">
                    <div class="relative w-full">
                        <form action="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>forum/search"
                              method="POST">
                            <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                            <input type="text" name="for"
                                   class="block p-1 w-full z-20 text-sm dark:text-white text-gray-900 bg-gray-50 dark:bg-gray-700 rounded-lg border-gray-100 border-l-2 border dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500"
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
                    <?php if ($category->isUserAllowed()): ?>
                        <div class="w-full shadow-md mb-10">
                            <div class="flex py-4 bg-gray-800 text-gray-300 rounded-t-lg shadow">
                                <div
                                    class="md:w-[55%] px-4 font-bold"><?= $category->getFontAwesomeIcon() ?> <?= $category->getName() ?></div>
                                <div
                                    class="hidden md:block w-[10%] font-bold text-center"><?= ThemeModel::getInstance()->fetchConfigValue('forum_topics') ?></div>
                                <div
                                    class="hidden md:block w-[10%] font-bold text-center"><?= ThemeModel::getInstance()->fetchConfigValue('forum_message') ?></div>
                                <div
                                    class="hidden md:block w-[25%] font-bold text-center"><?= ThemeModel::getInstance()->fetchConfigValue('forum_last_message') ?></div>
                            </div>
                            <?php foreach ($forumModel->getForumByCat($category->getId()) as $forumObj): ?>
                                <?php if ($forumObj->isUserAllowed()): ?>
                                    <div
                                        class="flex py-6 border-t text-gray-300 bg-gray-700 hover:bg-gray-500">
                                        <div class="md:w-[55%] px-5">
                                            <a class="flex"
                                               href="<?= $forumObj->getLink() ?>">
                                                <div
                                                    class="py-2 px-2 bg-gradient-to-b from-gray-400 to-gray-300 rounded-xl shadow-connect w-fit h-fit">
                                                    <?= $forumObj->getFontAwesomeIcon("fa-xl") ?>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="font-bold">
                                                        <?= $forumObj->getName() ?>
                                                    </div>
                                                    <div>
                                                        <?= $forumObj->getDescription() ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div
                                            class="hidden md:block w-[10%] text-center my-auto"><?= $forumModel->countTopicInForum($forumObj->getId()) ?></div>
                                        <div
                                            class="hidden md:inline-block w-[10%] text-center my-auto"><?= $forumModel->countMessagesInForum($forumObj->getId()) ?></div>
                                        <!--Dernier message-->
                                        <div class="hidden md:block w-[25%] my-auto">
                                            <div class="flex text-sm">
                                                <?php if ($forumObj->getLastResponse() !== null) : ?>
                                                <a href="<?= $forumObj->getParent()->getLink() ?>/f/<?= $forumObj->getLastResponse()->getResponseTopic()->getForum()->getSlug() ?>/t/<?= $forumObj->getLastResponse()->getResponseTopic()->getSlug() ?>/p<?= $forumObj->getLastResponse()->getPageNumber() ?>/#<?= $forumObj->getLastResponse()?->getId() ?>">
                                                    <?php endif; ?>
                                                    <div tabindex="0" class="avatar w-10">
                                                        <div class="w-fit rounded-full ">
                                                            <img
                                                                src="<?= $forumObj->getLastResponse()?->getUser()->getUserPicture()->getImage() ?? ThemeModel::getInstance()->fetchImageLink("forum_nobody_send_message_img") ?>"/>
                                                        </div>
                                                    </div>
                                                </a>
                                                <?php if ($forumObj->getLastResponse() !== null) : ?>
                                                <a href="<?= $forumObj->getParent()->getLink() ?>/f/<?= $forumObj->getLastResponse()->getResponseTopic()->getForum()->getSlug() ?>/t/<?= $forumObj->getLastResponse()->getResponseTopic()->getSlug() ?>/p<?= $forumObj->getLastResponse()->getPageNumber() ?>/#<?= $forumObj->getLastResponse()?->getId() ?>">
                                                    <?php endif; ?>
                                                    <div class="ml-2">
                                                        <div
                                                            class=""><?= $forumObj->getLastResponse()?->getUser()->getPseudo() ?? ThemeModel::getInstance()->fetchConfigValue('forum_nobody_send_message_text') ?></div>
                                                        <div><?= $forumObj->getLastResponse()?->getCreated() ?? "" ?></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
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
                                            src="https://discord.com/widget?id=<?= ThemeModel::getInstance()->fetchConfigValue('forum_widgets_content_id') ?>&theme=dark"
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
