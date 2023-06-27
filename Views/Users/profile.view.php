<?php

/* @var \CMW\Entity\Users\UserEntity $user */

use CMW\Manager\Env\EnvManager;
use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

$title = Website::getName() . ' - Profil - ' . $user->getPseudo();
$description = 'Profil de  ' . $user->getPseudo();
?>

<div class="bg-[#18202E] w-full pt-14 pb-4">
    <div class="text-center pt-4 font-extrabold text-4xl border-t border-gray-500">Votre profil</div>
</div>
<div class="custom-shape-divider-top-1667065406">
    <svg width="100%" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="bg-[#1e293b] text-[#18202E] h-2 lg:h-10">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
    </svg>
</div>
<div class="bg-[#18202E] rounded-lg shadow my-8 mx-2 xl:mx-72">
    <div class="flex flex-no-wrap justify-center items-center py-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase"><?= $user->getPseudo() ?></h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="p-4">
        <div class="md:grid md:grid-cols-2 md:gap-16">
            <div>
                <p class="text-center uppercase font-bold">Informations personnel</p>
                <form class="space-y-6" action="profile/update" method="post">
                    <?php (new SecurityManager())->insertHiddenToken() ?>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium">Votre mail</label>
                        <input type="email" name="email" id="email" class="bg-gray-800 border border-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= $user->getMail() ?>" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium">Pseudo / Nom d'affichage</label>
                        <input type="text" name="pseudo" id="pseudo" class="bg-gray-800 border border-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= $user->getPseudo() ?>" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="********" class="bg-gray-800 border border-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium">Confirmation</label>
                        <input type="password" name="passwordVerif" id="passwordVerif" placeholder="********" class="bg-gray-800 border border-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <div class="px-16">
                        <button type="submit" class="w-full bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Appliquer les modifications</button>
                    </div>
                </form>
            </div>
            <div class="md:hidden mt-4 border"></div>
            <div>
                <div class="mb-4">
                    <p class="text-center uppercase font-bold mb-2">Identité visuel</p>
                    <?php if (!is_null($user->getUserPicture()?->getImageName())): ?>
                    <!--RECUPERER L'iMAGE-->
                    <label for="password" class="block mb-2 text-sm font-medium">Votre image :</label>
                    <img class="mx-auto rounded-lg border border-gray-600 shadow-xl" src="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>Public/Uploads/Users/<?= $user->getUserPicture()->getImageName() ?>" height="50%" width="50%" alt="Image de profil de <?/*= $user->getUsername()*/ ?>">
                    <?php endif; ?>
                </div>
                <div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <?php (new SecurityManager())->insertHiddenToken() ?>
                        <label for="password" class="block mb-2 text-sm font-medium">Changer votre image :</label>
                        <div class="flex">
                            <input class="block w-full text-sm rounded-l-lg bg-gray-800 border border-gray-900 cursor-pointer focus:outline-none" type="file" id="pictureProfile" name="pictureProfile" accept=".png, .jpg, .jpeg, .webp, .gif" required>
                            <button class="inline bg-blue-900 hover:bg-blue-800 font-medium rounded-r-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2" type="submit">Sauvegarder</button>
                        </div>
                        <p class="mt-1 text-sm" id="file_input_help">PNG, JPG, JPEG, WEBP, GIF (MAX. 400px400px).</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-no-wrap justify-center items-center pt-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase">Vous nous quittez ?</h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="pt-2 pb-6 text-center">
        <p class="mb-2">Nous somme triste de vous voir partir !</p>
        <a href="<?= EnvManager::getInstance()->getValue("PATH_SUBFOLDER") ?>profile/delete/<?= $user->getId() ?>" class="mb-4 bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Supprimer mon compte</a>
    </div>

</div>
