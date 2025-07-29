<?php
/* @var \CMW\Entity\Users\UserEntity $user */

use CMW\Controller\Core\PackageController;
use CMW\Controller\Users\UsersSessionsController;
use CMW\Manager\Env\EnvManager;
use CMW\Controller\Users\UsersController;
use CMW\Model\Core\MenusModel;
use CMW\Model\Shop\Cart\ShopCartItemModel;
use CMW\Utils\Website;

if (PackageController::isInstalled('Shop')) {
    $itemInCart = ShopCartItemModel::getInstance()->countItemsByUserId(UsersSessionsController::getInstance()->getCurrentUser()?->getId(), session_id());
}

$menus = MenusModel::getInstance();
?>


<div class="absolute top-0 left-0 w-full z-50">
    <div class="text-white md:hidden w-full text-center bg-[#18202E]">
        <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 rounded-lg"
                aria-controls="navbar-cta" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                      clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    <nav class="px-2 sm:px-4 bg-[#18202E] md:bg-transparent">
        <div class="hidden md:block" id="navbar-cta">
            <div class="flex flex-wrap justify-between items-center mx-auto">
                <div class="flex order-2 mx-auto md:mx-0">
                    <?php if (UsersController::isUserLogged()): ?>
                        <ul class=" flex-col rounded-lg md:flex-row md:space-x-8 md:mt-0">
                            <li id="multiLevelDropdownButton" data-dropdown-toggle="dropdown1"
                                class="cursor-pointer text-white font-medium rounded-lg px-5 py-2.5 "><i
                                    class="mr-2 fa-solid fa-user"></i><?= UsersSessionsController::getInstance()->getCurrentUser()->getPseudo() ?></li>
                            <div id="dropdown1"
                                 class="hidden z-10 w-44 rounded divide-y divide-gray-100 shadow bg-gray-800 border border-gray-400">
                                <ul class="py-1" aria-labelledby="multiLevelDropdownButton">
                                    <?php if (UsersController::isAdminLogged()) : ?>
                                        <li class="">
                                            <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>cmw-admin"
                                               target="_blank" class="block py-2 px-4 text-white"><i
                                                    class="fa-solid fa-screwdriver-wrench"></i> Administration</a>
                                        </li>
                                    <?php endif; ?>
                                    <li>
                                        <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>profile"
                                           class="block py-2 px-4 text-white"><i class="fa-regular fa-address-card"></i>
                                            Profil</a>
                                    </li>
                                    <?php if (PackageController::isInstalled('Shop')): ?>
                                        <li>
                                            <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>shop/settings"
                                               class="block py-2 px-4 text-white"><i class="fa-solid fa-gear"></i>
                                                Paramètres</a>
                                        </li>
                                        <li>
                                            <a href="<?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>shop/history"
                                               class="block py-2 px-4 text-white"><i class="fa-solid fa-clipboard-list"></i>
                                                Commandes</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                                <div class="py-1">
                                    <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>logout"
                                       class="block py-2 px-4 text-red-400"><i
                                            class="fa-solid fa-right-from-bracket"></i> Déconnexion</a>
                                </div>
                            </div>
                        </ul>
                    <?php else: ?>
                            <a data-cmw-visible="global:header_allow_login_button" href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>login"
                               class="text-white font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2">Connexion</a>
                            <a data-cmw-visible="global:header_allow_register_button" href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>register"
                               class="text-white font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 ">S'inscrire</a>
                    <?php endif; ?>
                    <?php if (PackageController::isInstalled('Shop')): ?>
                        <div>
                            <a href="<?= Website::getProtocol() ?>://<?= $_SERVER['SERVER_NAME'] ?><?= EnvManager::getInstance()->getValue('PATH_SUBFOLDER') ?>shop/cart" style="display: inline-flex; position: relative; align-items: center; padding: .75rem;font-size: 0.875rem;line-height: 1.25rem">
                                <i class="text-lg fa-solid fa-cart-shopping"></i>
                                <span class="sr-only">Articles</span>
                                <div style="display: inline-flex; position: absolute; top: -0.2rem; right: -0.2rem; justify-content: center; align-items: center;width: 1.2rem; height: 1.2rem; font-size: 0.75rem;line-height: 1rem;font-weight: 700; color: white; background: red; border-radius: 100%"><?= $itemInCart ?></div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="justify-between items-center w-full md:flex md:w-auto order-1 text-white font-bold">
                    <ul class="flex flex-col p-4 mt-4 rounded-lg md:flex-row md:space-x-8 md:mt-0">
                        <?php foreach ($menus->getMenus() as $menu): ?>
                            <?php if ($menu->isUserAllowed()): ?>
                                <li id="multiLevelDropdownButton" data-dropdown-toggle="dropdown-<?= $menu->getId() ?>"
                                    class="cursor-pointer block py-2 pr-4 pl-3 md:p-0"><a
                                        href="<?= $menu->getUrl() ?>" <?= !$menu->isTargetBlank() ?: "target='_blank'" ?>
                                    ><?= $menu->getName() ?></a>
                                </li>
                                <div id="dropdown-<?= $menu->getId() ?>"
                                     class="hidden z-10 w-44 rounded divide-y divide-gray-100 shadow bg-gray-800 border border-gray-100">
                                    <?php foreach ($menus->getSubMenusByMenu($menu->getId()) as $subMenu): ?>
                                        <ul class="py-1" aria-labelledby="multiLevelDropdownButton">
                                            <li>
                                                <a href="<?= $subMenu->getUrl() ?>" id="doubleDropdownButton"
                                                   data-dropdown-toggle="doubleDropdown-<?= $subMenu->getId() ?>"
                                                   data-dropdown-placement="right-start" type="button"
                                                   class="flex justify-between items-center py-2 px-4 w-full"><?= $subMenu->getName() ?>
                                                </a>
                                                <?php foreach ($menus->getSubMenusByMenu($subMenu->getId()) as $subSubMenu): ?>
                                                <div id="doubleDropdown<?= $subMenu->getId() ?>"
                                                     class="hidden z-10 w-44 rounded divide-y bg-gray-800 border border-gray-100 shadow"
                                                     style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(10px, 300px);"
                                                     data-popper-reference-hidden="" data-popper-escaped=""
                                                     data-popper-placement="right-start">
                                                    <ul class="py-1" aria-labelledby="doubleDropdownButton">
                                                        <li>
                                                            <a href="<?= $subSubMenu->getUrl() ?>" class="block py-2 px-4 "><?= $subSubMenu->getName() ?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <?php endforeach; ?>
                                            </li>
                                        </ul>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>