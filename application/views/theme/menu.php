<!DOCTYPE html>
<html lang="en">
<head>

    <!-- meta link -->

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- link for the icons -->
    
    <script src="https://unpkg.com/feather-icons"></script>
    
    <!-- link for the favicon -->
    
	<link rel="shortcut icon" href="<?php echo base_url() . 'public/img/favicon.ico' ?>" type="image/x-icon">
    
    <!-- link for the font -->
    
    <link href="https://api.fontshare.com/v2/css?f[]=boska@500,400,700,300&f[]=general-sans@200,500,300,600,400,700&display=swap" rel="stylesheet">

    <!-- link for jquery -->

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    <!-- tailwind css link -->

    <link rel="stylesheet" href="<?php echo base_url() . 'src/css/datatable.css' ?>" />
    <link rel="stylesheet" href="<?php echo base_url() . 'public/output.css' ?>" />
    
    <!-- link for the lottie animation -->

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <!-- link for the bodymovin library -->

    <script src="https://cdnjs.com/libraries/bodymovin"></script>

    <!-- link for toastr notifications  -->
    
    <link rel="stylesheet" href="<?php echo base_url() . 'src/css/toastr.css' ?>">
    <script src="<?php echo base_url() . 'src/js/toastr.js' ?>"></script>

    <!-- title -->
    
    <title>stock</title>

</head>

<body class="bg-zinc-100 w-full h-full">

    <!-- SIDEBAR -->
        
    <div class="group fixed left-0 z-[150] w-[100px] h-full p-6 bg-stone-50 rounded-tr-2xl rounded-br-2xl shadow-lg transition-all duration-500 hover:w-[300px]">


        <nav class="h-full overflow-hidden">

            
            <!-- the logo -->

            <div class="my-6 mx-4 transition-all duration-500 group-hover:mt-12 group-hover:mb-0">
                <a href="<?php echo base_url('Product/main'); ?>" class="inline-flex flex-row items-center gap-x-8">

                    <svg width="58" height="67" viewBox="0 0 58 67" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-[20px] h-[29px] transition-all duration-500 group-hover:w-[58px] group-hover:h-[67px]">
                        <path d="M57.5801 39.1249C57.5801 46.5178 54.5524 53.608 49.1631 58.8356C43.7737 64.0632 36.4642 67 28.8425 67C21.2209 67 13.9114 64.0632 8.52202 58.8356C3.13268 53.608 0.104981 46.5178 0.10498 39.1249C0.10498 32.1304 3.19115 24.0702 9.27914 15.1693C9.46076 14.9037 9.6946 14.6754 9.96727 14.4976C10.24 14.3197 10.5461 14.1958 10.8682 14.1329C11.1903 14.0699 11.5221 14.0693 11.8445 14.1308C12.1669 14.1924 12.4735 14.3151 12.747 14.4918L22.8289 21.0115L32.4654 1.38199C32.6372 1.03177 32.8932 0.726677 33.2118 0.492341C33.5305 0.258005 33.9025 0.101271 34.2965 0.0353068C34.6905 -0.0306569 35.0951 -0.00392323 35.4763 0.113261C35.8575 0.230446 36.2041 0.434659 36.4871 0.708742C41.0926 5.16815 46.3512 10.5777 50.4354 16.8863C55.2427 24.3126 57.5798 31.5868 57.5798 39.1246L57.5801 39.1249Z" fill="#D2DAFF"/>
                        <path d="M28.8425 67C36.4642 67 43.7737 64.0632 49.1631 58.8356C43.1983 41.2852 37.5332 32.9391 22.8289 21.0115L12.747 14.4918C12.4735 14.3151 12.1669 14.1924 11.8445 14.1308C11.5221 14.0692 11.1903 14.0699 10.8682 14.1329C10.5461 14.1958 10.24 14.3197 9.96727 14.4976C9.6946 14.6754 9.46076 14.9036 9.27914 15.1692C3.19115 24.0702 0.10498 32.1303 0.10498 39.1249C0.10498 46.5178 3.13268 53.608 8.52202 58.8356C13.9114 64.0632 21.2209 67 28.8425 67Z" fill="#AAC4FF"/>
                    </svg>

                    <svg width="113" height="46" viewBox="0 0 113 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-0 h-0 translate-y-1 transition-all duration-500 group-hover:w-[113px] group-hover:h-[46px]">
                        <path d="M13.3359 22.8359H4.64062V17.3516H13.3359C14.6797 17.3516 15.7734 17.1328 16.6172 16.6953C17.4609 16.2422 18.0781 15.6172 18.4688 14.8203C18.8594 14.0234 19.0547 13.125 19.0547 12.125C19.0547 11.1094 18.8594 10.1641 18.4688 9.28906C18.0781 8.41406 17.4609 7.71094 16.6172 7.17969C15.7734 6.64844 14.6797 6.38281 13.3359 6.38281H7.07812V35H0.046875V0.875H13.3359C16.0078 0.875 18.2969 1.35938 20.2031 2.32812C22.125 3.28125 23.5938 4.60156 24.6094 6.28906C25.625 7.97656 26.1328 9.90625 26.1328 12.0781C26.1328 14.2812 25.625 16.1875 24.6094 17.7969C23.5938 19.4062 22.125 20.6484 20.2031 21.5234C18.2969 22.3984 16.0078 22.8359 13.3359 22.8359ZM46.3688 29.2812V17.9844C46.3688 17.1719 46.2359 16.4766 45.9703 15.8984C45.7047 15.3047 45.2906 14.8438 44.7281 14.5156C44.1813 14.1875 43.4703 14.0234 42.5953 14.0234C41.8453 14.0234 41.1969 14.1562 40.65 14.4219C40.1031 14.6719 39.6813 15.0391 39.3844 15.5234C39.0875 15.9922 38.9391 16.5469 38.9391 17.1875H32.1891C32.1891 16.1094 32.4391 15.0859 32.9391 14.1172C33.4391 13.1484 34.1656 12.2969 35.1188 11.5625C36.0719 10.8125 37.2047 10.2266 38.5172 9.80469C39.8453 9.38281 41.3297 9.17188 42.9703 9.17188C44.9391 9.17188 46.6891 9.5 48.2203 10.1562C49.7516 10.8125 50.9547 11.7969 51.8297 13.1094C52.7203 14.4219 53.1656 16.0625 53.1656 18.0312V28.8828C53.1656 30.2734 53.2516 31.4141 53.4234 32.3047C53.5953 33.1797 53.8453 33.9453 54.1734 34.6016V35H47.3531C47.025 34.3125 46.775 33.4531 46.6031 32.4219C46.4469 31.375 46.3688 30.3281 46.3688 29.2812ZM47.2594 19.5547L47.3063 23.375H43.5328C42.6422 23.375 41.8688 23.4766 41.2125 23.6797C40.5563 23.8828 40.0172 24.1719 39.5953 24.5469C39.1734 24.9062 38.8609 25.3281 38.6578 25.8125C38.4703 26.2969 38.3766 26.8281 38.3766 27.4062C38.3766 27.9844 38.5094 28.5078 38.775 28.9766C39.0406 29.4297 39.4234 29.7891 39.9234 30.0547C40.4234 30.3047 41.0094 30.4297 41.6813 30.4297C42.6969 30.4297 43.5797 30.2266 44.3297 29.8203C45.0797 29.4141 45.6578 28.9141 46.0641 28.3203C46.4859 27.7266 46.7047 27.1641 46.7203 26.6328L48.5016 29.4922C48.2516 30.1328 47.9078 30.7969 47.4703 31.4844C47.0484 32.1719 46.5094 32.8203 45.8531 33.4297C45.1969 34.0234 44.4078 34.5156 43.4859 34.9062C42.5641 35.2812 41.4703 35.4688 40.2047 35.4688C38.5953 35.4688 37.1344 35.1484 35.8219 34.5078C34.525 33.8516 33.4938 32.9531 32.7281 31.8125C31.9781 30.6562 31.6031 29.3438 31.6031 27.875C31.6031 26.5469 31.8531 25.3672 32.3531 24.3359C32.8531 23.3047 33.5875 22.4375 34.5563 21.7344C35.5406 21.0156 36.7672 20.4766 38.2359 20.1172C39.7047 19.7422 41.4078 19.5547 43.3453 19.5547H47.2594ZM67.9172 32.1406L74.6437 9.64062H81.8859L71.6906 38.8203C71.4719 39.4609 71.175 40.1484 70.8 40.8828C70.4406 41.6172 69.9484 42.3125 69.3234 42.9688C68.7141 43.6406 67.9406 44.1875 67.0031 44.6094C66.0812 45.0312 64.9484 45.2422 63.6047 45.2422C62.9641 45.2422 62.4406 45.2031 62.0344 45.125C61.6281 45.0469 61.1437 44.9375 60.5812 44.7969V39.8516C60.7531 39.8516 60.9328 39.8516 61.1203 39.8516C61.3078 39.8672 61.4875 39.875 61.6594 39.875C62.55 39.875 63.2766 39.7734 63.8391 39.5703C64.4016 39.3672 64.8547 39.0547 65.1984 38.6328C65.5422 38.2266 65.8156 37.6953 66.0187 37.0391L67.9172 32.1406ZM65.1047 9.64062L70.6125 28.0156L71.5734 35.1641L66.9797 35.6562L57.8625 9.64062H65.1047ZM109.294 0.875H112.177V23.9844C112.177 26.5469 111.637 28.6797 110.559 30.3828C109.481 32.0859 108.028 33.3594 106.2 34.2031C104.387 35.0469 102.38 35.4688 100.177 35.4688C97.9109 35.4688 95.8719 35.0469 94.0594 34.2031C92.2469 33.3594 90.8094 32.0859 89.7469 30.3828C88.7 28.6797 88.1766 26.5469 88.1766 23.9844V0.875H91.0359V23.9844C91.0359 25.9688 91.4266 27.6328 92.2078 28.9766C92.9891 30.3203 94.0672 31.3281 95.4422 32C96.8172 32.6719 98.3953 33.0078 100.177 33.0078C101.942 33.0078 103.512 32.6719 104.887 32C106.262 31.3281 107.341 30.3203 108.122 28.9766C108.903 27.6328 109.294 25.9688 109.294 23.9844V0.875Z" fill="black"/>
                    </svg>

                </a>
            </div>

            <!-- the main sidebar element -->

            <div class="grid gap-y-9 sm:w-[300px] mt-32 mx-4 mb-32" id="sidebar">
                
                <a href="<?php echo base_url('Product/main'); ?>" class="flex items-center gap-x-5 text-neutral-500 <?php echo ($this->uri->segment(2) == 'main') ? 'text-primary-800' : ''; ?> hover:text-primary-500 transition-colors duration-200">
                    <i data-feather="grid" class="w-[20px] h-[20px] stroke-[1.5]"></i>
                    <span>Tableau de bord</span>
                </a>

                <a href="<?php echo base_url('Product/history'); ?>" class="flex items-center gap-x-5 text-neutral-500 <?php echo ($this->uri->segment(2) == 'history') ? 'text-primary-800' : ''; ?> hover:text-primary-500 transition-colors duration-200">
                    <i data-feather="calendar" class="w-[20px] h-[20px] stroke-[1.5]"></i>
                    <span>Historique</span>
                </a>

                <div class="group/collapse">

                    <a href="#1" class="peer flex items-center gap-x-5 text-neutral-500 <?php echo ($this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'list' || $this->uri->segment(2) == 'edit') ? 'text-primary-800' : ''; ?> hover:text-primary-500 transition-colors duration-200">
                        <i data-feather="box" class="w-[20px] h-[20px] stroke-[1.5]"></i>
                        <span>Produits</span>
                        <i data-feather="chevron-down" class="w-[20px] h-[20px] mx-auto stroke-[1.5] transition-transform duration-300 group-hover/collapse:rotate-180"></i>
                    </a>

                    <div class="overflow-hidden h-5 transition-all duration-300 ease-linear group-hover/collapse:h-[150px]">
                        <div class="px-12 py-2">
                            <a href="<?php echo base_url('Product/create'); ?>" class="flex items-center gap-x-5 my-4 text-neutral-500 hover:text-primary-500 transition-colors duration-200"><span class="text-sm">ajouter produit</span></a>
                            <a href="<?php echo base_url('Product/list'); ?>" class="flex items-center gap-x-5 my-4 text-neutral-500 hover:text-primary-500 transition-colors duration-200"><span class="text-sm">tableau des produits</span></a>
                            <a href="<?php echo base_url('Product/edit_first'); ?>" class="flex items-center gap-x-5 my-4 text-neutral-500 hover:text-primary-500 transition-colors duration-200"><span class="text-sm">details produits</span></a>
                            <a href="<?php echo base_url('Category'); ?>" class="flex items-center gap-x-5 my-4 text-neutral-500 hover:text-primary-500 transition-colors duration-200"><span class="text-sm">catégorie</span></a>
                        </div>
                    </div>

                </div>

                <a href="<?php echo base_url('Settings/settings_view'); ?>" class="flex items-center gap-x-5 mt-20 text-neutral-500 <?php echo ($this->uri->segment(1) == 'Settings') ? 'text-primary-800' : ''; ?> hover:text-primary-500 transition-colors duration-200">
                    <i data-feather="settings" class="w-[20px] h-[20px] stroke-[1.5]"></i>
                    <span>Paramètre</span>
                </a>

                <a href="<?php echo base_url('Login_handler/logout'); ?>" class="flex items-center gap-x-5 text-neutral-500 hover:text-primary-500 transition-colors duration-200">
                    <i data-feather="log-out" class="w-[20px] h-[20px] stroke-[1.5]"></i>
                    <span>Deconnexion</span>
                </a>
                
            </div>

        </nav> 
        
    </div>
    
    <!-- HEADER -->
    
    <div class="sticky flex justify-between z-[100] top-0 w-full h-20 m-0 pl-32 py-4 bg-white/80 backdrop-blur-md shadow-sm">

        <!-- search bar container  -->

        <div class="w-[320px] h-full">

            <form class="flex items-center h-full">

                <label for="simple-search" class="sr-only">Recherchez</label>

                <div class="relative w-full">

                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-neutral-500 dark:text-neutral-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                        </svg>
                    </div>

                    <input type="text" id="simple-search" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5  dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Recherchez par mots clé..." required>

                </div>

                <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-gradient-to-b from-primary-800 to-primary-700 rounded-lg border border-primary-700 hover:bg-gradient-to-b hover:from-primary-800 hover:to-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <i data-feather="search" class="w-4 h-4"></i>
                    <span class="sr-only">Recherchez</span>
                </button>

            </form>

        </div>

        <!-- top settings section -->

        <div class="flex items-center justify-between">

            <!-- action toggle -->

            <div class="flex items-center justify-between">

                <button type="button" id="darkToggle" class="group p-2.5 ml-2 text-sm font-medium text-neutral-500 rounded-full hover:bg-neutral-200 full focus:ring-4 focus:outline-none dark:bg-primary-600 dark:hover:bg-primary-700 transition-colors duration-300">
                    <i data-feather="moon" id="moon" class="w-4 h-4 group-hover:text-primary-800"></i>
                    <i data-feather="sun" id="sun" class="w-4 h-4 group-hover:text-primary-800 hidden"></i>
                    <span class="sr-only">night</span>
                </button>

                <button type="button" class="group p-2.5 ml-2 text-sm font-medium text-neutral-500 rounded-full hover:bg-neutral-200 full focus:ring-4 focus:outline-none dark:bg-primary-600 dark:hover:bg-primary-700 transition-colors duration-300">
                    <i data-feather="bell" class="w-4 h-4 group-hover:text-primary-800"></i>
                    <span class="sr-only">notification</span>
                </button>

            </div>

            <!-- profile section -->

            <div class="flex items-center justify-center cursor-pointer w-[350px]" id="profilePopover"  >

                <div class="flex justify-center items-center h-10 w-10 rounded-full bg-neutral-500 border border-solid border-neutral-500 cursor-pointer" style="background-image: url(<?php echo base_url() . 'public/img/akashi.png' ?>); background-repeat: no-repeat; background-size: cover;"></div>
                
                <span class="mx-2 text-neutral-600"><?php echo($full_name); ?></span>

                <button 
                    type="button"
                    class="p-2.5 text-sm font-medium text-neutral-500 rounded-full transition-colors duration-300"
                    data-ripple-light="true"
                >
                    <i data-feather="chevron-down" class="w-4 h-4"></i>
                    <span class="sr-only">information sur le profile</span>
                </button>

                <!-- the popover element -->

                <div class="hidden absolute translate-y-20 w-max z-[150] whitespace-normal break-words rounded-lg border border-blue-gray-50 bg-white font-sans text-sm font-normal text-blue-gray-500 shadow-md shadow-neutral-500/20 focus:outline-none" id="popoverElement">

                    <div class="flex items-center w-full py-2 border-b border-solid border-neutral-500/70 hover:bg-neutral-100">
                        <a href="<?php echo base_url('Settings/settings_view'); ?>" class="flex w-full m-2">
                            <i data-feather="edit-2" class="w-4 h-4 mx-2 text-neutral-500"></i>
                            <span class="text-neutral-500">Modifier mon profil</span>
                        </a>
                    </div>

                    <div class="flex items-center w-full py-2 border-t border-solid border-neutral-500/70 hover:bg-neutral-100">
                        <a href="<?php echo base_url('Login_handler/logout'); ?>" class="flex w-full m-2">
                            <i data-feather="log-out" class="w-4 h-4 mx-2 text-neutral-500"></i>
                            <span class="text-neutral-500">Se déconnecter</span>
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>
    
    <!-- MAIN CONTENT -->

    <div class="ml-[100px]">
    
        <?php echo $output; ?>

    </div>

    <!-- material tailwind script -->

    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script type="module" src="https://unpkg.com/@material-tailwind/html@2.0.0/scripts/popover.js"></script>

    <!-- flowbite script -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

    <!-- main script -->

    <script src="<?php echo base_url() . 'src/js/products/menu' ?>"></script> 
    

</body>

</html>