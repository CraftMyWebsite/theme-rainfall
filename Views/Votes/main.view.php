<?php

use CMW\Controller\Core\ThemeController;
use CMW\Manager\Env\EnvManager;
use CMW\Model\Users\UsersModel;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/*TITRE ET DESCRIPTION*/
$title = Website::getWebsiteName() . ' - '. ThemeModel::fetchConfigValue('vote_title');
$description = ThemeModel::fetchConfigValue('vote_description');
?>

<div class="bg-[#18202E] w-full pt-14 pb-4">
    <div class="text-center pt-4 font-extrabold text-4xl border-t border-gray-500"><?= ThemeModel::fetchConfigValue('votes_page_title') ?></div>
</div>
<div class="custom-shape-divider-top-1667065406">
    <svg width="100%" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
         preserveAspectRatio="none" class="bg-[#1e293b] text-[#18202E] h-2 lg:h-10">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
              opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
              opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
              class="shape-fill"></path>
    </svg>
</div>

<section class="px-4 lg:px-16 py-6">
    <?php if (ThemeModel::fetchConfigValue('widget_use_vote')): ?>
    <div class="lg:grid lg:grid-cols-5 gap-6">
        <div>
            <?php include_once("Public/Themes/Rainfall/Views/Includes/widget.inc.php"); ?>
        </div>
        <?php endif; ?>

        <section class="px-2 mx-2 <?php if (!ThemeModel::fetchConfigValue('widget_use_vote')): ?>lg:mx-72<?php endif; ?> col-span-4">
            <div class="lg:grid lg:grid-cols-3 gap-6">
                <div class="bg-[#18202E] container mx-auto rounded-md shadow-lg p-8 h-fit">
                    <div class="flex flex-no-wrap justify-center items-center py-4">
                        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                        <div class="px-10 w-auto">
                            <h2 class="font-semibold text-2xl uppercase"><?=
                                ThemeModel::fetchConfigValue('votes_participate_title') ?></h2>
                        </div>
                        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    </div>


                    <?php if (UsersModel::getCurrentUser()?->getId() === -1): ?>
                    <!-- Si le joueur n'est pas connecté -->
                    <div class="rounded-md shadow-lg p-2 mb-4">
                        <div class="text-center">Pour pouvoir voter et récupérer vos récompenses vous devez être
                            connecté
                            sur le site, alors n'attendez plus pour obtenir des récompenses uniques !
                        </div>
                        <div class="pt-4 pb-2 text-center">
                            <a href="<?= EnvManager::getInstance()->getValue(" PATH_SUBFOLDER") ?>login" target="_blank"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium
                            rounded-lg px-4 py-2">Connexion</i></a>
                        </div>
                    </div>

                    <?php else: ?>
                    <!-- LIST SITES -->
                    <?php foreach ($sites as $site): ?>
                    <div class="bg-gray-800 rounded-md shadow-lg p-2 mb-4">
                        <div class="flex flex-wrap justify-between">
                            <div class="font-medium"><?= $site->getTitle() ?></div>
                            <div class="bg-gray-500 font-medium inline-block px-3 py-1 rounded-sm text-xs "><i
                                    class="fa-solid fa-clock-rotate-left"></i> <?= $site->getTimeFormatted() ?>
                            </div>
                        </div>
                        <div class="flex flex-wrap justify-between">
                            <div class="mt-2 py-2 font-medium">Récompense : <span class="font-bold"><?= $site->getRewards()?->getTitle() ?></span>
                            </div>
                            <div class="pt-4 pb-2">
                                <a href="<?= $site->getUrl() ?>" target="_blank"
                                   class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2">Voter
                                    <i class="fa-solid fa-award"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>

                </div>
                <div class="col-span-2">
                    <div class="bg-[#18202E] container mx-auto rounded-md shadow-lg p-8">
                        <div class="flex flex-no-wrap justify-center items-center py-4">
                            <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                            <div class="px-10 w-auto">
                                <h2 class="font-semibold text-2xl uppercase"><?=
                                    ThemeModel::fetchConfigValue('votes_top_10_title') ?></h2>
                            </div>
                            <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                        </div>

                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-600">
                                <thead class="text-xs text-white uppercase bg-gray-800">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        <i class="fa-solid fa-user"></i> Voteur
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        <i class="fa-solid fa-trophy"></i> Position
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        <i class="fa-solid fa-award"></i> Nombres de votes
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $i = 0;
                                foreach ($topCurrent as $top): $i++; ?>

                                <tr class="bg-gray-600">
                                    <td scope="row"
                                        class="flex items-center lg:px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="hidden lg:inline-block w-10 h-10 rounded-full"
                                             src="<?= $top->getUser()->getUserPicture()->getImageLink() ?>" alt="...">
                                        <div class="lg:pl-3 py-4">
                                            <div class="text-base font-semibold"><?= $top->getUser()->getPseudo() ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <?php $color_position = $i  ?>
                                        <div class="
                                                <?php
                                        switch ($color_position) {
                                            case '1':
                                                echo "bg-amber-400";
                                                break;
                                            case '2':
                                                echo "bg-amber-300";
                                                break;
                                            case '3':
                                                echo "bg-amber-200";
                                                break;
                                            default:
                                                echo "bg-blue-200";
                                                break;
                                        }
                                        ?>
                                             inline-block px-3 py-1 rounded-sm font-medium text-black"># <?= $i ?></div>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <div class="font-medium"><?= $top->getVotes() ?></div>
                                    </td>
                                </tr>

                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <?php if(ThemeModel::fetchConfigValue('votes_display_global')): ?>
            <div class="md:px-16 xl:px-28 2xl:px-48 mt-4">
                <div class="bg-[#18202E] container mx-auto rounded-md shadow-lg p-8">
                    <div class="flex flex-no-wrap justify-center items-center py-4">
                        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                        <div class="px-10 w-auto">
                            <h2 class="font-semibold text-2xl uppercase"><?=
                                ThemeModel::fetchConfigValue('votes_top_10_global_title') ?></h2>
                        </div>
                        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    </div>

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-600">
                            <thead class="text-xs text-white uppercase bg-gray-800">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    <i class="fa-solid fa-user"></i> Voteur
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    <i class="fa-solid fa-trophy"></i> Position
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    <i class="fa-solid fa-award"></i> Nombres de votes
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; foreach ($topGlobal as $top): $i++; ?>
                            <tr class="bg-gray-600">
                                <th scope="row"
                                    class="flex items-center lg:px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="hidden lg:inline-block w-10 h-10 rounded-full"
                                         src="<?= $top->getUser()->getUserPicture()->getImageLink() ?>" alt="...">
                                    <div class="lg:pl-3 py-4">
                                        <div class="text-base font-semibold"><?= $top->getUser()->getPseudo() ?></div>
                                    </div>
                                </th>
                                <td class="py-4 px-6 text-center">
                                    <?php $color_position = $i  ?>
                                    <div class="
                                <?php
                                    switch ($color_position) {
                                        case '1':
                                            echo "bg-amber-400";
                                            break;
                                        case '2':
                                            echo "bg-amber-300";
                                            break;
                                        case '3':
                                            echo "bg-amber-200";
                                            break;
                                        default:
                                            echo "bg-blue-200";
                                            break;
                                    }
                                    ?>
                            inline-block px-3 py-1 rounded-sm font-medium text-black"># <?= $i ?>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <div class="font-medium"><?= $top->getVotes() ?></div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <?php endif; ?>
        </section>
        <?php if (ThemeModel::fetchConfigValue('widget_use_vote')): ?></div><?php endif; ?>
</section>

<link rel="stylesheet" href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'Admin/Resources/Vendors/Izitoast/iziToast.min.css' ?>">
<script src="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') . 'Admin/Resources/Vendors/Izitoast/iziToast.min.js' ?>"></script>
<script src="<?= ThemeController::getCurrentTheme()->getPath() . 'Views/Votes/Resources/Js/VotesLogic.js' ?>"></script>