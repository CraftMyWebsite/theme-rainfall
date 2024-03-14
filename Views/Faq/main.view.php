<?php

use CMW\Manager\Security\SecurityManager;
use CMW\Model\Core\ThemeModel;
use CMW\Utils\Website;

/*TITRE ET DESCRIPTION*/
Website::setTitle(ThemeModel::getInstance()->fetchConfigValue('faq_title'));
Website::setDescription(ThemeModel::getInstance()->fetchConfigValue('faq_description'));
?>

<div class="bg-[#18202E] w-full pt-14 pb-4">
    <div class="text-center pt-4 font-extrabold text-4xl border-t border-gray-500"><?= ThemeModel::getInstance()->fetchConfigValue('faq_page_title') ?></div>
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

<section class="px-2 md:px-24 xl:px-48 2xl:px-72 py-6">
    <div class="<?php if(ThemeModel::getInstance()->fetchConfigValue('faq_display_form')): {echo "lg:grid lg:grid-cols-3 gap-6";} endif ?>">
        <?php if(ThemeModel::getInstance()->fetchConfigValue('faq_display_form')): ?>
        <div style="background-color: #18202E !important;" class="container mx-auto rounded-md shadow-lg p-8">
            <div class="flex flex-no-wrap justify-center items-center py-4">
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                <div class="px-10 w-auto">
                    <h2 class="font-semibold text-2xl uppercase">Une question ?</h2>
                </div>
                <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
            </div>
            <form action="contact" method="post" class="">
                <?php (new SecurityManager())->insertHiddenToken() ?>
                <div class="flex flex-wrap -mx-4 mb-4">
                    <div class="px-4 w-full md:w-6/12 lg:w-6/12">
                        <label for="email-address-icon" class="block mb-2 text-sm font-medium">Votre mail :</label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <input type="email" name="email" id="email-address-icon" class="bg-gray-800 border border-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="votre@mail.com">
                        </div>
                    </div>
                    <div class="px-4 w-full md:w-6/12 lg:w-6/12">
                        <label for="email-address-icon" class="block mb-2 text-sm font-medium ">Votre nom :</label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <i class="fa-regular fa-user"></i>
                            </div>
                            <input type="text" name="name" id="email-address-icon" class="bg-gray-800 border border-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Jean Dupont">
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="email-address-icon" class="block mb-2 text-sm font-medium">Sujet :</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                        <input type="text" name="object" id="email-address-icon" class="bg-gray-800 border border-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="J'aimerais aborder avec vous ...">
                    </div>
                </div>
                <div class="mb-2">
                    <label for="message" class="block mb-2 text-sm font-medium">Votre message :</label>
                    <textarea minlength="50" id="message" name="content" rows="4" class="block p-2.5 w-full text-sm bg-gray-800 border border-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bonjour,"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Soumettre <i class="fa-solid fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
        <?php endif; ?>
        <div class="col-span-2">
            <div style="background-color: #18202E !important;" class="container mx-auto rounded-md shadow-lg p-8">
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-semibold text-2xl uppercase"><?= ThemeModel::getInstance()->fetchConfigValue('faq_answer_title') ?></h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                <?php foreach ($faqList as $faq) : ?>
                <div class="border-b py-2">
                    <div class="flex flex-wrap justify-between">
                        <div class="font-medium">- <?= $faq->getQuestion() ?> :</div>
                        <?php if(ThemeModel::getInstance()->fetchConfigValue('faq_display_autor')): ?>
                        <div class="bg-gray-500 font-medium inline-block px-3 py-1 rounded-sm text-xs uppercase"><?= $faq->getAuthor()->getPseudo() ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="ml-4"><?= $faq->getResponse() ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>