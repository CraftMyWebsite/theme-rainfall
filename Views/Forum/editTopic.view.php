<?php

use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Manager\Security\SecurityManager;
use CMW\Controller\Users\UsersController;
use CMW\Utils\Website;

/* @var \CMW\Entity\Forum\ForumCategoryEntity $category */
/* @var CMW\Entity\Forum\ForumEntity $forum */

Website::setTitle("Forum");
Website::setDescription("Éditez un topic");
?>

<div class="bg-[#18202E] w-full pt-14 pb-4">
    <div
        class="text-center pt-4 font-extrabold text-4xl border-t border-gray-500" data-cmw="forum:forum_title"></div>
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
    <?php if (ThemeModel::getInstance()->fetchConfigValue('widget','widget_use_forum')): ?>
    <div class="lg:grid lg:grid-cols-5 gap-6">
        <div>
            <?php include_once("Public/Themes/Rainfall/Views/Includes/widget.inc.php"); ?>
        </div>
        <?php endif; ?>
        <section
            class="bg-[#18202E] rounded-lg shadow h-fit mx-2 <?php if (!ThemeModel::getInstance()->fetchConfigValue('widget','widget_use_forum')): ?>lg:mx-72<?php endif; ?> col-span-4">
            <section>

                <section class="lg:grid grid-cols-4 gap-6 p-6">
                    <div class="col-span-3">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1">
                                <li class="inline-flex items-center">
                                    <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>forum"
                                       class="inline-flex items-center text-sm font-medium hover:text-blue-600 dark:text-gray-400 dark:hover:text-white" data-cmw="forum:forum_breadcrumb_home">
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        <a href="<?= $category->getLink() ?>"
                                           class="ml-1 text-sm font-medium hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $category->getName() ?></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        <a href="<?= $forum->getLink() ?>"
                                           class="ml-1 text-sm font-medium hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $forum->getName() ?></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        <a href="<?= $topic->getLink($category->getLink(), $forum->getSlug()) ?>"
                                           class="ml-1 text-sm font-medium hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"><?= $topic->getName() ?></a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </section>


                <section class="px-6">
                    <div class="rounded-md shadow-lg p-8">

                        <h4>Edition du topic : <?= $topic->getName() ?></b></h4>
                        <form action="" method="post">
                            <?php SecurityManager::getInstance()->insertHiddenToken() ?>
                            <div class="border-b p-2">
                                <div class="bg-gray-600 rounded-lg p-3">
                                    <p class="font-semibold mt-4 text-center">Topic<span class="text-red-500">*</span>
                                    </p>
                                    <div class="grid gap-6 mb-4 md:grid-cols-2 mt-4">
                                        <div>
                                            <input type="text" name="topicId" hidden value="<?= $topic->getId() ?>">
                                            <label for="title"
                                                   class="block mb-2 text-sm font-medium text-white">Titre
                                                du topic<span class="text-red-500">*</span> :</label>
                                            <input name="name" id="title" type="text"
                                                   class="dark:bg-gray-700 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                   placeholder="Titre du topic" required
                                                   value="<?= $topic->getName() ?>">
                                        </div>
                                        <div>
                                            <label for="last_name"
                                                   class="block mb-2 text-sm font-medium text-white">Tags
                                                :
                                                <small>Séparez vos tags par ','</small></label>
                                            <input name="tags" type="text" id="last_name"
                                                   class="dark:bg-gray-700 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                   placeholder="Tag1,Tag2,Tag3"
                                                   value="<?php foreach ($topic->getTags() as $tag) {
                                                       echo "" . $tag->getContent() . ",";
                                                   } ?>">
                                        </div>
                                    </div>
                                    <label for="summernote-1"
                                           class="block mb-2 text-sm font-medium text-white">Contenue<span
                                            class="text-red-500">*</span> :</label>
                                    <textarea name="content"
                                              class="w-full tinymce"><?= $topic->getContent() ?></textarea>
                                </div>
                            </div>

                            <div class="text-center mt-2">
                                <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                                    <i class="fa-solid fa-pen-to-square"></i> Éditer
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </section>
        <?php if (ThemeModel::getInstance()->fetchConfigValue('widget','widget_use_forum')): ?></div><?php endif; ?>
</section>