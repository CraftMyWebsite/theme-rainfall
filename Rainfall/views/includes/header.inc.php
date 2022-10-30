<?php
/* @var \CMW\Entity\Users\UserEntity $user */

use CMW\Utils\Utils;
use CMW\Controller\Users\UsersController;
use CMW\Model\Core\CoreModel;
use CMW\Model\Users\UsersModel;
use CMW\Model\Core\ThemeModel;
?>
<div class="absolute top-0 left-0 w-full z-50">
    <div style="background-color: <?= ThemeModel::fetchConfigValue('secondaryColor') ?> !important;" class="text-white md:hidden w-full text-center">
        <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 rounded-lg" aria-controls="navbar-cta" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <nav class="px-2 sm:px-4 bg-[#18202E] md:bg-transparent">
        <div class="hidden md:block" id="navbar-cta">
        <div class="flex flex-wrap justify-between items-center mx-auto">
            <div class="flex order-2 mx-auto md:mx-0">

                <?php if(UsersController::isUserLogged()): ?>
                <ul class=" flex-col rounded-lg md:flex-row md:space-x-8 md:mt-0">
                    <li id="multiLevelDropdownButton" data-dropdown-toggle="dropdown1" class="cursor-pointer text-white font-medium rounded-lg px-5 py-2.5 " ><i class="mr-2 fa-solid fa-user"></i><?= UsersModel::getCurrentUser()->getUsername() ?></li>
                    <div id="dropdown1" class="hidden z-10 w-44 rounded divide-y divide-gray-100 shadow bg-gray-600 border border-gray-100">
                        <ul class="py-1" aria-labelledby="multiLevelDropdownButton">
                            <?php if (UsersController::isAdminLogged()) : ?>
                            <li>
                                <a href="/cmw-admin" target="_blank" class="block py-2 px-4 text-white"><i class="fa-solid fa-screwdriver-wrench"></i> Administration</a>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a href="/profile" class="block py-2 px-4 text-white"><i class="fa-regular fa-address-card"></i> Profile</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="/logout" class="block py-2 px-4 text-red-400"><i class="fa-solid fa-right-from-bracket"></i> Déconnexion</a>
                        </div>
                    </div>
                </ul>
                <?php else: ?>
                <?php if(ThemeModel::fetchConfigValue('header_allow_login_button')): ?>
                <a href="/login" class="text-white font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2">Connexion</a>
                <?php endif; ?>
                <?php if(ThemeModel::fetchConfigValue('header_allow_register_button')): ?>
                <a href="/register" class="text-white font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 ">S'inscrire</a>
                <?php endif; ?>
<?php endif; ?>
            </div>

            <div class="justify-between items-center w-full md:flex md:w-auto order-1 text-white font-bold" >
                    <ul class="flex flex-col p-4 mt-4 rounded-lg md:flex-row md:space-x-8 md:mt-0">
                        <li>
                            <a href="/" class="block py-2 pr-4 pl-3 rounded md:p-0" aria-current="page">Accueil</a>
                        </li>
                        <li>
                            <a href="/news" class="block py-2 pr-4 pl-3 rounded md:p-0" aria-current="page">News</a>
                        </li>
                        <li>
                            <a href="/faq" class="block py-2 pr-4 pl-3 rounded md:p-0" aria-current="page">F.A.Q</a>
                        </li>
                        <li>
                            <a href="/wiki" class="block py-2 pr-4 pl-3 rounded md:p-0" aria-current="page">Wiki</a>
                        </li>
                        <li>
                            <a href="/votes" class="block py-2 pr-4 pl-3 rounded md:p-0" aria-current="page">Votes</a>
                        </li>
                        
        </div>
        </div>
    </nav>
</div>