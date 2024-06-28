<?php

use CMW\Controller\Forum\Admin\ForumPermissionController;
use CMW\Controller\Users\UsersController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Model\Forum\ForumPrefixModel;
use CMW\Model\Users\UsersModel;
use CMW\Utils\Website;

/* @var CMW\Model\Forum\ForumModel $forumModel */
/* @var \CMW\Entity\Forum\ForumCategoryEntity $category */
/* @var CMW\Entity\Forum\ForumEntity $forum */
/* @var CMW\Entity\Forum\ForumTopicEntity[] $topics */
/* @var CMW\Model\Forum\ForumTopicModel $topicModel */
/* @var CMW\Entity\Forum\ForumTopicEntity $topic */
/* @var CMW\Model\Forum\ForumResponseModel $responseModel */
/* @var CMW\Controller\Forum\Admin\ForumSettingsController $iconNotRead */
/* @var CMW\Controller\Forum\Admin\ForumSettingsController $iconImportant */
/* @var CMW\Controller\Forum\Admin\ForumSettingsController $iconPin */
/* @var CMW\Controller\Forum\Admin\ForumSettingsController $iconClosed */
/* @var CMW\Controller\Forum\ForumSettingsController $iconNotReadColor */
/* @var CMW\Controller\Forum\ForumSettingsController $iconImportantColor */
/* @var CMW\Controller\Forum\ForumSettingsController $iconPinColor */
/* @var CMW\Controller\Forum\ForumSettingsController $iconClosedColor */

Website::setTitle("Forum");
Website::setDescription("Consultez les sujets de discussion et répondez aux questions posées par les membres de votre communauté.");
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
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1">
                                <li class="inline-flex items-center">
                                    <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>forum"
                                       class="inline-flex items-center text-sm font-medium hover:text-blue-600">
                                        <?= ThemeModel::getInstance()->fetchConfigValue('forum_breadcrumb_home') ?>
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        <a href="<?= $category->getLink() ?>"
                                           class="ml-1 text-sm font-medium hover:text-blue-600 md:ml-2"><?= $category->getName() ?></a>
                                    </div>
                                </li>
                                <?php foreach ($forumModel->getParentByForumId($forum->getId()) as $parent): ?>
                                    <li>
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-chevron-right"></i>
                                            <a href="<?= $parent->getLink() ?>"
                                               class="ml-1 text-sm font-medium hover:text-blue-600 md:ml-2"><?= $parent->getName() ?></a>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        </nav>
                    </div>
                    <form>
                        <div class="flex">
                            <?php if (UsersController::isUserLogged()): ?>
                                <?php if (!$forum->disallowTopics() && ForumPermissionController::getInstance()->hasPermission("user_create_topic") || ForumPermissionController::getInstance()->hasPermission("operator") || ForumPermissionController::getInstance()->hasPermission("admin_bypass_forum_disallow_topics")): ?>
                                    <div class="text-center mb-4">
                                        <a href="<?= $forum->getLink() ?>/add"
                                           class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none"><i
                                                class="<?= ThemeModel::getInstance()->fetchConfigValue('forum_btn_create_topic_icon') ?>"></i> <?= ThemeModel::getInstance()->fetchConfigValue('forum_btn_create_topic') ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </form>
                </section>


                <section
                    class="<?php if (ThemeModel::getInstance()->fetchConfigValue('forum_use_widgets')): ?>lg:grid <?php endif; ?> grid-cols-4 gap-6 px-6">
                    <div class="lg:col-span-3 h-fit">
                        <?php if ($forumModel->getSubforumByForum($forum->getId(), true)): ?>
                            <div class="w-full shadow-md mb-10">
                                <div
                                    class="flex py-4 bg-gray-800 text-gray-300 rounded-t-lg shadow">
                                    <div
                                        class="md:w-[55%] px-4 font-bold"><?= ThemeModel::getInstance()->fetchConfigValue('forum_sub_forum') ?></div>
                                    <div
                                        class="hidden md:block w-[10%] font-bold text-center"><?= ThemeModel::getInstance()->fetchConfigValue('forum_topics') ?></div>
                                    <div
                                        class="hidden md:block w-[10%] font-bold text-center"><?= ThemeModel::getInstance()->fetchConfigValue('forum_message') ?></div>
                                    <div
                                        class="hidden md:block w-[25%] font-bold text-center"><?= ThemeModel::getInstance()->fetchConfigValue('forum_last_message') ?></div>
                                </div>

                                <?php foreach ($forumModel->getSubforumByForum($forum->getId(), true) as $forumEntity): ?>
                                    <?php if ($forumEntity->isUserAllowed()): ?>
                                        <div
                                            class="flex py-6 border-t text-gray-300 bg-gray-700 hover:bg-gray-500">
                                            <div class="md:w-[55%] px-5">
                                                <a class="flex"
                                                   href="<?= $forumEntity->getLink() ?>">
                                                    <div
                                                        class="py-2 px-2 rounded-xl shadow-connect w-fit h-fit">
                                                        <?= $forumEntity->getFontAwesomeIcon("fa-xl") ?>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="font-bold">
                                                            <?= $forumEntity->getName() ?>
                                                        </div>
                                                        <div>
                                                            <?= $forumEntity->getDescription() ?>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div
                                                class="hidden md:block w-[10%] text-center my-auto"><?= $forumModel->countTopicInForum($forumEntity->getId()) ?></div>
                                            <div
                                                class="hidden md:inline-block w-[10%] text-center my-auto"><?= $forumModel->countMessagesInForum($forumEntity->getId()) ?></div>
                                            <!--Dernier message-->
                                            <div class="hidden md:block w-[25%] my-auto">
                                                <div class="flex text-sm">
                                                    <?php if ($forumEntity->getLastResponse() !== null) : ?>
                                                    <a href="../<?= $forumEntity->getLastResponse()->getResponseTopic()->getForum()->getSlug() ?>/t/<?= $forumEntity->getLastResponse()->getResponseTopic()->getSlug() ?>/p<?= $forumEntity->getLastResponse()->getPageNumber() ?>/#<?= $forumEntity->getLastResponse()?->getId() ?>">
                                                        <?php endif; ?>
                                                        <div tabindex="0" class="avatar w-10">
                                                            <div class="w-fit rounded-full ">
                                                                <img
                                                                    src="<?= $forumEntity->getLastResponse()?->getUser()->getUserPicture()->getImage() ?? ThemeModel::getInstance()->fetchImageLink("forum_nobody_send_message_img") ?>"/>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <?php if ($forumEntity->getLastResponse() !== null) : ?>
                                                    <a href="../<?= $forumEntity->getLastResponse()->getResponseTopic()->getForum()->getSlug() ?>/t/<?= $forumEntity->getLastResponse()->getResponseTopic()->getSlug() ?>/p<?= $forumEntity->getLastResponse()->getPageNumber() ?>/#<?= $forumEntity->getLastResponse()?->getId() ?>">
                                                        <?php endif; ?>
                                                        <div class="ml-2">
                                                            <div
                                                                class=""><?= $forumEntity->getLastResponse()?->getUser()->getPseudo() ?? ThemeModel::getInstance()->fetchConfigValue('forum_nobody_send_message_text') ?></div>
                                                            <div><?= $forumEntity->getLastResponse()?->getCreated() ?? "" ?></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif ?>


                        <div class="w-full shadow-md mb-10">
                            <div class="flex py-4 bg-gray-800 text-gray-300 rounded-t-lg shadow">
                                <div
                                    class="md:w-[55%] px-4 font-bold"><?= ThemeModel::getInstance()->fetchConfigValue('forum_topics') ?></div>
                                <div
                                    class="hidden md:block w-[10%] font-bold text-center"><?= ThemeModel::getInstance()->fetchConfigValue('forum_display') ?></div>
                                <div
                                    class="hidden md:block w-[10%] font-bold text-center"><?= ThemeModel::getInstance()->fetchConfigValue('forum_response') ?></div>
                                <div
                                    class="hidden md:block w-[25%] font-bold text-center"><?= ThemeModel::getInstance()->fetchConfigValue('forum_last_message') ?></div>
                            </div>


                            <?php foreach ($topics as $topic): ?>
                                <div
                                    class="relative flex py-2 border-t text-gray-300 bg-gray-700 hover:bg-gray-500">
                                    <div class="md:w-[55%] px-5 relative">
                                        <a class="flex flex-wrap hover:text-blue-400"
                                           href="<?= $topic->getLink() ?>">
                                            <div class="w-12 h-12 shadow-xl">
                                                <img style="object-fit: fill; max-height: 48px; max-width: 48px"
                                                     width="48px"
                                                     height="48px"
                                                     src="<?= $topic->getUser()->getUserPicture()->getImage() ?>"/>
                                            </div>
                                            <div class="ml-4">
                                                <p><?php if ($topic->getPrefixId()): ?><span
                                                        class="px-2 text-white rounded-lg"
                                                        style="color: <?= $topic->getPrefixTextColor() ?>; background: <?= $topic->getPrefixColor() ?>"><?= $topic->getPrefixName() ?></span> <?php endif; ?><?= $topic->getName() ?>
                                                </p>
                                                <p><span
                                                        class="font-medium"><?= $topic->getUser()->getPseudo() ?></span>
                                                    <span
                                                        class="text-sm">le <?= $topic->getCreated() ?></span></p>
                                                </p>
                                            </div>
                                            <div class="absolute top-0 right-0">
                                                <?= $topic->isImportant() ? "
                            <i data-tooltip-target='tooltip-important' style='color: $iconImportantColor' class='<?= $iconImportant ?> fa-sm'></i>
                            <div id='tooltip-important' role='tooltip' class='absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg'>
                                Important
                            </div>
                            " : "" ?>
                                                <?= $topic->isPinned() ? "
                            <i data-tooltip-target='tooltip-pined' style='color: $iconPinColor' class='<?= $iconPin ?> fa-sm ml-2'></i>
                            <div id='tooltip-pined' role='tooltip' class='absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg'>
                                Épinglé
                            </div>
                             " : "" ?>
                                                <?= $topic->isDisallowReplies() ? "
                            <i data-tooltip-target='tooltip-closed' style='color: $iconClosedColor' class='<?= $iconClosed ?> fa-sm ml-2'></i>
                            <div id='tooltip-closed' role='tooltip' class='absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg'>
                                Fermé
                            </div>
                             " : "" ?>
                                            </div>
                                        </a>
                                    </div>
                                    <div
                                        class="hidden md:block w-[10%] text-center my-auto"><?= $topic->countViews() ?></div>
                                    <div
                                        class="hidden md:inline-block w-[10%] text-center my-auto"><?= $responseModel->countResponseInTopic($topic->getId()) ?></div>
                                    <!--Dernier message-->
                                    <div class="hidden md:block w-[25%] my-auto">
                                        <div class="flex text-sm">
                                            <?php if ($topic->getLastResponse() !== null) : ?>
                                            <a href="t/<?= $topic->getLastResponse()->getResponseTopic()->getSlug() ?>/p<?= $topic->getLastResponse()->getPageNumber() ?>/#<?= $topic->getLastResponse()?->getId() ?>">
                                                <?php endif; ?>
                                                <div tabindex="0" class="avatar w-10">
                                                    <div class="w-fit">
                                                        <img
                                                            src="<?= $topic->getLastResponse()?->getUser()->getUserPicture()->getImage() ?? ThemeModel::getInstance()->fetchImageLink("forum_nobody_send_message_img") ?>"/>
                                                    </div>
                                                </div>
                                            </a>
                                            <?php if ($topic->getLastResponse() !== null) : ?>
                                            <!--                                    TODO : determiné dans quel page se trouve la réponse-->
                                            <a href="t/<?= $topic->getLastResponse()->getResponseTopic()->getSlug() ?>/p<?= $topic->getLastResponse()->getPageNumber() ?>/#<?= $topic->getLastResponse()?->getId() ?>">
                                                <?php endif; ?>
                                                <div class="ml-2">
                                                    <div
                                                        class=""><?= $topic->getLastResponse()?->getUser()->getPseudo() ?? ThemeModel::getInstance()->fetchConfigValue('forum_nobody_send_message_text') ?></div>
                                                    <div><?= $topic->getLastResponse()?->getCreated() ?? "" ?></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php if (UsersController::isAdminLogged()) : ?>
                                        <!------------------
                                         -- ADMIN SECTION --
                                        -------------------->
                                        <i data-modal-target="defaultModal-<?= $topic->getId() ?>"
                                           data-modal-toggle="defaultModal-<?= $topic->getId() ?>"
                                           data-tooltip-target="tooltip-admin"
                                           class="absolute right-1 top-8 fa-solid fa-lg fa-screwdriver-wrench text-red-400 ml-6 "></i>
                                        <div id="tooltip-admin" role="tooltip"
                                             class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                            Administration du topic
                                        </div>
                                        <!------------------
                                         --- ADMIN MODAL ---
                                        -------------------->
                                        <div id="defaultModal-<?= $topic->getId() ?>" tabindex="-1" aria-hidden="true"
                                             class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                            <div class="relative w-full h-full max-w-2xl md:h-auto">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            Gestion de <?= $topic->getName() ?>
                                                        </h3>
                                                        <button type="button"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="defaultModal-<?= $topic->getId() ?>">
                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                      clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-4">

                                                        <form id="modal-<?= $topic->getId() ?>"
                                                              action="<?= $forum->getLink() ?>/adminedit" method="post">
                                                            <?php (new SecurityManager())->insertHiddenToken() ?>

                                                            <input type="text" name="topicId" hidden
                                                                   value="<?= $topic->getId() ?>">

                                                            <div class="flex justify-between mb-2">
                                                                <div class="flex space-x-4">
                                                                    <div class="flex items-start">
                                                                        <div class="flex items-center h-5">
                                                                            <input name="important" value="1"
                                                                                   id="important-<?= $topic->getId() ?>"
                                                                                   type="checkbox"
                                                                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50" <?= $topic->isImportant() ? 'checked' : '' ?>>
                                                                        </div>
                                                                        <label for="important-<?= $topic->getId() ?>"
                                                                               class="ml-2 text-sm font-medium text-gray-900"><i
                                                                                class="<?= $iconImportant ?> text-orange-500 fa-sm"></i>
                                                                            Important</label>
                                                                    </div>
                                                                    <div class="flex items-start">
                                                                        <div class="flex items-center h-5">
                                                                            <input name="pin"
                                                                                   id="pin-<?= $topic->getId() ?>"
                                                                                   type="checkbox" value=""
                                                                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50" <?= $topic->isPinned() ? 'checked' : '' ?>>
                                                                        </div>
                                                                        <label for="pin-<?= $topic->getId() ?>"
                                                                               class="ml-2 text-sm font-medium text-gray-900"><i
                                                                                class="<?= $iconPin ?> text-red-600 fa-sm"></i>
                                                                            Épingler</label>
                                                                    </div>
                                                                    <div class="flex items-start">
                                                                        <div class="flex items-center h-5">
                                                                            <input name="disallow_replies" value="1"
                                                                                   id="closed-<?= $topic->getId() ?>"
                                                                                   type="checkbox"
                                                                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50" <?= $topic->isDisallowReplies() ? 'checked' : '' ?>>
                                                                        </div>
                                                                        <label for="closed-<?= $topic->getId() ?>"
                                                                               class="ml-2 text-sm font-medium text-gray-900"><i
                                                                                class="<?= $iconClosed ?> text-yellow-300 fa-sm"></i>
                                                                            Fermer</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="grid gap-6 md:grid-cols-2">
                                                                <div>
                                                                    <label for="title"
                                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre
                                                                        du topic<span class="text-red-500">*</span>
                                                                        :</label>
                                                                    <input name="name" id="title" type="text"
                                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                           placeholder="Titre du topic"
                                                                           value="<?= $topic->getName() ?>"
                                                                           required>
                                                                </div>
                                                                <div>
                                                                    <label for="tags"
                                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags
                                                                        du topic<span class="text-red-500">*</span>
                                                                        :</label>
                                                                    <input name="tags" id="tags" type="text"
                                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                                           placeholder="Titre du topic"
                                                                           value="<?php foreach ($topic->getTags() as $tag) {
                                                                               echo "" . $tag->getContent() . ",";
                                                                           } ?>">
                                                                </div>
                                                            </div>

                                                            <div class="grid gap-6 md:grid-cols-2 mt-2">
                                                                <div>
                                                                    <label for="prefix"
                                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prefix
                                                                        :</label>
                                                                    <select name="prefix" id="prefix"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                                        <option value="">Aucun</option>
                                                                        <?php foreach ($prefixesModel = ForumPrefixModel::getInstance()->getPrefixes() as $prefix) : ?>
                                                                            <option value="<?= $prefix->getId() ?>"
                                                                                <?= ($topic->getPrefixName() === $prefix->getName() ? "selected" : "") ?>>
                                                                                <?= $prefix->getName() ?>
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div>
                                                                    <label for="countries"
                                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Déplacer
                                                                        vers :</label>
                                                                    <select id="forum" name="move"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        <!--                                                        TODO Améliorer la façon dont les options sont affiché-->
                                                                        <?php foreach ($categoryModel->getCategories() as $cat): ?>
                                                                            <option disabled>──── <?= $cat->getName() ?>
                                                                                ────
                                                                            </option>
                                                                            <?php foreach ($forumModel->getForumByCat($cat->getId()) as $forumObj): ?>
                                                                                <option
                                                                                    value="<?= $forumObj->getId() ?>" <?= ($forumObj->getName() === $topic->getForum()->getName() ? "selected" : "") ?>><?= $forumObj->getName() ?></option>
                                                                                <?php foreach ($forumModel->getSubsForums($forumObj->getId()) as $subForum): ?>
                                                                                    <option
                                                                                        value="<?= $subForum["subforum"]->getId() ?>" <?= ($subForum["subforum"]->getName() === $topic->getForum()->getName() ? "selected" : "") ?>> <?= str_repeat("      ", $subForum["depth"]) ?>
                                                                                        ↪ <?= $subForum["subforum"]->getName() ?></option>
                                                                                <?php endforeach; ?>
                                                                            <?php endforeach; ?>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </form>


                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div
                                                        class="flex justify-between p-6 space-x-2 border-t border-gray-200 rounded-b">
                                                        <a href="<?= $topic->trashLink() ?>"
                                                           class="text-gray-700 border-2 border-red-700 hover:border-red-800 font-medium rounded-md text-sm px-2 py-2.5 mr-2 mb-2">
                                                            <i class="fa-solid fa-trash fa-lg"></i> Corbeille
                                                        </a>

                                                        <button type="submit" form="modal-<?= $topic->getId() ?>"
                                                                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-md text-sm px-2 py-2.5 mr-2 mb-2">
                                                            Valider
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <?php if ($totalPage > "1"): ?>
                            <div class="mx-auto">
                                <div class="flex justify-center">
                                    <?php if ($currentPage !== "1"): ?>
                                        <a href="fp1"
                                           class="mr-2 p-1 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <i class="fa-solid fa-chevron-left"></i><i
                                                class="fa-solid fa-chevron-left"></i></a>
                                        <a href="fp<?= $currentPage - 1 ?>"
                                           class="p-1 text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <i class="fa-solid fa-chevron-left"></i></a>
                                    <?php endif; ?>
                                    <span
                                        class="border border-blue-700 p-1 text-sm"><?= $currentPage ?>/<?= $totalPage ?></span>
                                    <?php if ($currentPage !== $totalPage): ?>
                                        <a href="fp<?= $currentPage + 1 ?>"
                                           class="p-1 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <i class="fa-solid fa-chevron-right"></i></a>
                                        <a href="fp<?= $totalPage ?>"
                                           class="ml-2 p-1 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <i class="fa-solid fa-chevron-right"></i><i
                                                class="fa-solid fa-chevron-right"></i></a>
                                    <?php endif; ?>
                                </div>
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


