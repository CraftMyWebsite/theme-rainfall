<?php

use CMW\Controller\Users\UsersController;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

$title = Website::getWebsiteName() . ' - ' . ThemeModel::fetchConfigValue('news_title') . ' - ' . $news->getTitle();
$description = ThemeModel::fetchConfigValue('news_description');
?>

<div style="background-color: #18202E !important;" class="w-full pt-14 pb-4">
    <div class="text-center pt-4 font-bold text-4xl border-t border-gray-500"><?= $news->getTitle() ?></div>
</div>
<div class="custom-shape-divider-top-1667065406">
    <svg width="100%" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
         preserveAspectRatio="none" class="h-2 lg:h-10" style="background-color: #1e293b !important; color: #18202E;">
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
    <?php if (ThemeModel::fetchConfigValue('widget_use_news')): ?>
    <div class="lg:grid lg:grid-cols-5 gap-6">
        <div>
            <?php include_once("Public/Themes/Rainfall/Views/Includes/widget.inc.php"); ?>
        </div>
        <?php endif; ?>
        <div
            class=" mx-2 <?php if (!ThemeModel::fetchConfigValue('widget_use_news')): ?>lg:mx-72<?php endif; ?> col-span-4">
            <div class="container">
                <div class="bg-[#18202E] rounded-lg shadow h-fit p-4">
                    <div class="md:grid md:grid-cols-5 md:gap-16">
                        <div>
                            <img class="mx-auto rounded-lg border border-gray-300 shadow-xl"
                                 src="<?= $news->getImageLink() ?>"
                                 height="90%" width="90%" alt="...">
                            <div class="text-center mt-2">
                                <?= $news->getAuthor()->getPseudo() ?>
                            </div>
                            <div class="text-center mt-2">
                                <div
                                    class="bg-gray-300 text-gray-900 font-medium inline-block px-3 py-1 rounded-sm text-xs ">
                                    <?= $news->getDateCreated() ?>
                                </div>
                            </div>
                            <div class="text-center mt-2">
                                <div class="cursor-pointer">
                        <span data-tooltip-target="<?php if ($news->getLikes()->userCanLike()) {
                            echo "tooltip-liked";
                        } else {
                            echo "tooltip-like";
                        } ?>">
                        <span class="text-base"><?= $news->getLikes()->getTotal() ?>
                            <?php if ($news->getLikes()->userCanLike()): ?>
                                <a href="#"><i class="fa-solid fa-heart"></i></a>
                                <div id="tooltip-liked" role="tooltip"
                                     class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        <?php if (UsersController::isUserLogged()) {
                            echo "Vous aimez déjà !";
                        } else {
                            echo "Connectez-vous pour aimé !";
                        } ?>
                            <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            <?php else: ?>
                                <a href="<?= $news->getLikes()->getSendLike() ?>"><i
                                        class="fa-regular fa-heart"></i></a>
                                <div id="tooltip-like" role="tooltip"
                                     class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        Merci pour votre soutien !
                                <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            <?php endif; ?>
                        </span>
                        </span>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>news" class="text-blue-600">< Revenir aux news</a>
                            </div>
                        </div>
                        <div class="md:hidden mt-4 border"></div>
                        <div class="col-span-4">
                            <?= $news->getContent() ?>
                        </div>
                    </div>
                </div>
                <div class="flex flex-no-wrap justify-center items-center pt-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase">Espace commentaire</h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                <div class="pt-2 pb-6 px-2 lg:px-24 2xl:px-72">
                    <?php foreach ($news->getComments() as $comment): ?>
                    <div style="background-color: #18202E !important;"
                         class=" rounded-lg shadow md:grid md:grid-cols-5 py-4 pr-4 mb-4">
                        <div class="">
                            <img class="hidden lg:block mx-auto rounded-lg border border-gray-300 shadow-xl"
                                 src="<?= $comment->getUser()->getUserPicture()->getImageLink() ?>"
                                 height="50%" width="50%" alt="...">
                        </div>
                        <div class="col-span-4 px-4 md:px-0">

                            <div class="flex justify-between">
                                <div class="font-medium"><?= $comment->getUser()->getPseudo() ?> :</div>
                                <div
                                    class="bg-gray-300 text-gray-900 font-medium inline-block px-3 py-1 rounded-sm text-xs">
                                    <?= $comment->getDate() ?>
                                </div>
                            </div>

                            <div><?= $comment->getContent() ?></div>
                            <div class="flex justify-end">
                                <div class="cursor-pointer">
                                <span data-tooltip-target="<?php if ($comment->userCanLike()) {echo "tooltip-liked";} else {echo "tooltip-like";} ?>">
                                <span class="text-base"><?= $comment->getLikes()->getTotal() ?>
                                    <?php if ($comment->userCanLike()): ?>
                                        <a href="#"><i class="fa-solid fa-heart"></i></a>
                                        <div id="tooltip-liked" role="tooltip" class="hidden lg:inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                                        <?php if(UsersController::isUserLogged()) {echo "Vous aimez déjà !";} else {echo "Connectez-vous pour aimé !";} ?>
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <?php else: ?>
                                        <a href="<?= $comment->getSendLike() ?>"><i class="fa-regular fa-heart"></i></a>
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
                    <form method="post" action="<?= $news->sendComments() ?>" class="">
                        <?php (new SecurityManager())->insertHiddenToken() ?>
                        <label for="message" class="block mb-2 text-sm font-medium text-white dark:text-gray-400">Votre
                            commentaire :</label>
                        <textarea name="comments" id="message" rows="4" style="background-color: #18202E !important;"
                                  class="text-white block p-2.5 w-full text-sm rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                  placeholder="Bonjour,"></textarea>
                        <div class="text-center mt-4">
                            <?php if(UsersController::isUserLogged()): ?>
                            <button type="submit"
                                    class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">
                                Commenter <i class="fa-solid fa-comments"></i></i></button>
                            <?php else: ?>
                                <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>login"
                                    class="text-white bg-blue-400 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 text-center"
                                    >Connectez vous
                            </a>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php if (ThemeModel::fetchConfigValue('widget_use_news')): ?></div><?php endif; ?>
</section>
