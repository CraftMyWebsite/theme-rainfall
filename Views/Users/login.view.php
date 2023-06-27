<?php

use CMW\Manager\Env\EnvManager;
use CMW\Model\Core\ThemeModel;
use CMW\Controller\Core\SecurityController;
use CMW\Manager\Security\SecurityManager;
use CMW\Utils\Website;

$title = Website::getName() . ' - Connexion';
$description = 'Connectez-vous sur ' . Website::getName(); ?>

<div class="bg-[#18202E] w-full pt-14 pb-4">
    <div class="text-center pt-4 font-extrabold text-4xl border-t border-gray-500">Connexion</div>
</div>
<div class="custom-shape-divider-top-1667065406">
    <svg width="100%" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="bg-[#1e293b] text-[#18202E] h-2 lg:h-10">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
    </svg>
</div>
<div class="mx-auto relative p-4 w-full max-w-md h-full md:h-auto lg:mb-6 mt-6">
    <div class="relative bg-[#18202E] rounded-lg shadow">
        <div class="py-6 px-6 lg:px-8">
            <form class="space-y-6" action="" method="post">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium">Mail</label>
                    <input name="login_email" type="email" class="bg-gray-800 border border-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="mail@craftmywebsite.fr" required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium">Mot de passe</label>
                    <div class="flex">
                        <input type="password" name="login_password" id="passwordInput" placeholder="••••••••" class="block bg-gray-800 border border-gray-900 text-sm rounded-l-lg block w-full p-2.5" required>
                        <div onclick="showPassword()" class="cursor-pointer p-2.5 text-sm font-medium bg-blue-900 rounded-r-lg border border-blue-900 hover:bg-blue-800"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="login_keep_connect" name="login_keep_connect" type="checkbox" value="" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300">
                        </div>
                        <label for="login_keep_connect" class="ml-2 text-sm font-medium">Se souvenir de moi</label>
                    </div>
                    <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>login/forgot" class="text-sm text-blue-700 hover:underline">Mot de passe oublié ?</a>
                </div>
                <?php SecurityController::getPublicData(); ?>
                <button type="submit" class="w-full bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Connexion</button>
            </form>
            <div class="flex flex-no-wrap justify-center items-center py-4">
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                <div class="px-10 w-auto">
                    <p class="font-medium">Se connecter avec</p>
                </div>
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
            </div>
            <div class="px-4 py-2 justify-center text-center w-full sm:w-auto">
                <div class="flex-wrap inline-flex space-x-3">
                    <a href="#" class="hover:text-blue-600" aria-label="facebook">
                        <i class="fa-xl fa-brands fa-github"></i>
                    </a> <a href="#" class="hover:text-blue-600" aria-label="twitter">
                        <i class="fa-xl fa-brands fa-square-twitter"></i>
                    </a> <a href="#" class="hover:text-blue-600" aria-label="instagram">
                        <i class="fa-xl fa-brands fa-instagram"></i>
                    </a><a href="#" class="hover:text-blue-600" aria-label="discord">
                        <i class="fa-xl fa-brands fa-discord"></i></a>
                    <a href="#" class="hover:text-blue-600" aria-label="discord">
                        <i class="fa-xl fa-brands fa-google"></i></a>
                </div>
            </div>
            <label class="block text-sm mt-4">Pas encore de comtpe, <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>register" class="text-blue-500">s'enregistrer</a></label>
        </div>
    </div>
</div>


<script>
    function showPassword() {
        var x = document.getElementById("passwordInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
