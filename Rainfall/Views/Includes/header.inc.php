<?php
/* @var \CMW\Entity\Users\UserEntity $user */

use CMW\Manager\Env\EnvManager;
use CMW\Controller\Users\UsersController;
use CMW\Model\Core\MenusModel;
use CMW\Model\Users\UsersModel;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

$menus = MenusModel::getInstance();
?>


<div class="absolute top-0 left-0 w-full z-50">
    <div class="text-white md:hidden w-full text-center bg-[#18202E]">
        <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 rounded-lg" aria-controls="navbar-cta" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <nav class="px-2 sm:px-4 bg-[#18202E] md:bg-transparent">
        <div class="hidden md:block" id="navbar-cta">
            <div class="flex flex-wrap justify-between items-center mx-auto">
                <div class="flex order-2 mx-auto md:mx-0">
                    <a href="login" class="text-white font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2">Connexion</a>
                    <a href="register" class="text-white font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 ">S'inscrire</a>
                    <ul class=" flex-col rounded-lg md:flex-row md:space-x-8 md:mt-0">
                        <li id="multiLevelDropdownButton" data-dropdown-toggle="dropdown1" class="cursor-pointer text-white font-medium rounded-lg px-5 py-2.5 " ><i class="mr-2 fa-solid fa-user"></i>Zomb<!--TODO : Recuperer nom d'user--></li>
                        <div id="dropdown1" class="hidden z-10 w-44 rounded divide-y divide-gray-100 shadow bg-gray-600 border border-gray-100">
                            <ul class="py-1" aria-labelledby="multiLevelDropdownButton">
                                <li>
                                    <a href="cmw-admin" target="_blank" class="block py-2 px-4 text-white"><i class="fa-solid fa-screwdriver-wrench"></i> Administration</a>
                                </li>
                                <li>
                                    <a href="profile" class="block py-2 px-4 text-white"><i class="fa-regular fa-address-card"></i> Profile</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#" class="block py-2 px-4 text-red-400"><i class="fa-solid fa-right-from-bracket"></i> Déconnexion</a>
                            </div>
                        </div>
                    </ul>
                </div>

                <div class="justify-between items-center w-full md:flex md:w-auto order-1 text-white font-bold" >
                    <ul class="flex flex-col p-4 mt-4 rounded-lg md:flex-row md:space-x-8 md:mt-0">
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 rounded md:p-0" aria-current="page">Accueil</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 rounded md:p-0" aria-current="page">News</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 rounded md:p-0" aria-current="page">F.A.Q</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 rounded md:p-0" aria-current="page">Wiki</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 rounded md:p-0" aria-current="page">Votes</a>
                        </li>
                        <li id="multiLevelDropdownButton" data-dropdown-toggle="dropdown" class="cursor-pointer block py-2 pr-4 pl-3 md:p-0" >Test</li>
                        <div id="dropdown" class="hidden z-10 w-44 rounded divide-y divide-gray-100 shadow bg-gray-600 border border-gray-100">
                            <ul class="py-1" aria-labelledby="multiLevelDropdownButton">
                                <li>
                                    <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="flex justify-between items-center py-2 px-4 w-full">Sous menu<svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></button>
                                    <div id="doubleDropdown" class="hidden z-10 w-44 rounded divide-y bg-gray-600 border border-gray-100 shadow" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(10px, 300px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="right-start">
                                        <ul class="py-1" aria-labelledby="doubleDropdownButton">
                                            <li>
                                                <a href="#" class="block py-2 px-4 ">Ok !</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4">Ok !</a>
                                </li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>