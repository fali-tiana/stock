<!-- HEADER SECTION -->

<div class="header">

    <h1 class="text-[30px] font-bold">Détails de l'historique</h1>

    <a href="<?php echo base_url('Product/edit/' . ($product['id_product']) ); ?>" class="group flex items-center gap-4 cursor-pointer no-underline hover:opacity-80 transition-opacity duration-300">

        <p class="group-hover:-translate-x-2 group-hover:tracking-wider duration-500 delay-100 ease-linear">Voir les détails</p>
        <i id="arrow-right" data-feather="arrow-right" class="group-hover:translate-x-5 group-hover:scale-125 transition-all ease-linear duration-450"></i>

    </a>

</div>

<div class="h-screen w-full p-10 flex justify-between">

    <div class="h-fit w-[60%] rounded-xl bg-white p-6 shadow-lg overflow-hidden">

        <div class="h-20 w-full">
            <div class="m-auto h-20 w-20 p-4 rounded-full bg-gray-50 shadow-md">
                <img src="https://cdn-icons-png.flaticon.com/128/679/679922.png" alt="box image" class="w-full h-full">
            </div>
        </div>

        <div class="p-4 flex justify-center text-xl font-bold text-gray-800">
            <span><?php echo $product['product_name']; ?></span>
        </div>

        <div class="h-full w-full my-4">

            <div class="w-full flex justify-between mb-6 text-gray-400">

                <div class="flex flex-grow gap-2 items-center justify-center w-[113px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg>
                    <span class="font-semibold"><?php echo $product['article_code']; ?></span>
                </div>
                <div class="flex flex-grow gap-2 items-center justify-center w-[113px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                    <span class="font-semibold"><?php echo $product['stock_quantity']; ?></span>
                </div>
                <div class="flex flex-grow gap-2 items-center justify-center w-[113px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                    <span class="font-semibold"><?php echo $product['category_name']; ?></span>
                </div>

            </div>

            <div class="px-4">
                <p><?php echo $product['technical_properties']; ?></p>
            </div>

        </div>

    </div>

    <div class="h-fit w-1/3 rounded-xl shadow-lg bg-white p-8">
        
        <ol class="ml-6 relative border-l-2 border-l-gray-200 dark:border-l-gray-700">  

        <?php foreach ($history as $records) {

            $records_code = '';
            $records_text = '';
            $records_bg = '';
            $records_svg = '';

            switch ($records['event_type']) {

            case 'insert' : 
                $records_code = 'success';
                $records_text = 'text-success';
                $records_bg = 'bg-success-bg';
                $records_svg = "<svg class='w-5 h-5' style='width:1.25rem; height:1.25rem' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='#08C552' viewBox='0 0 20 20'><path d='M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z'/></svg>";
                break;

            case 'shipment' :
                $records_code = 'warning';
                $records_text = 'text-warning';
                $records_bg = 'bg-warning-bg';
                $records_svg = "<svg class='w-5 h-5' style='width:1.25rem; height:1.25rem;' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='#F28F1E' viewBox='0 0 20 20'><path d='M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z'/></svg>";
                break;

            case 'update' :
                $records_code = 'purplee';
                $records_text = 'text-purplee';
                $records_bg = 'bg-purplee-bg';
                $records_svg = "<svg class='w-5 h-5' style='width:1.25rem; height:1.25rem;' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='#8A2BE2' viewBox='0 0 20 20'><path d='M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z'/></svg>";
                break;

            default : 
                $records_code = 'info';
                $records_text = 'text-info';
                $records_bg = 'bg-info-bg';
                $records_svg = "<svg class='w-5 h-5' style='width:1.25rem; height:1.25rem;' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='#24BEFE' viewBox='0 0 20 20'><path d='M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z'/></svg>";

            }

            $currentDate = date('Y-m-d');
            $yesterday = date('Y-m-d', strtotime('-1 day', strtotime($currentDate)));
            $twoDaysAgo = date('Y-m-d', strtotime('-2 days', strtotime($currentDate)));
            $threeDaysAgo = date('Y-m-d', strtotime('-3 days', strtotime($currentDate)));

            $date = $records['date'];

            switch ($date) {

                case $currentDate :
                    $date = 'aujourd\'hui';
                    break;

                case $yesterday :
                    $date = 'hier';
                    break;

                case $twoDaysAgo :
                    $date = 'il y a deux jours';
                    break;

                case $threeDaysAgo :
                    $date = 'il y a trois jours';
                    break;

                default : 
                    $date = $records['date'];

            }

        ?>

            <li class="mb-10 ml-6">            
                <span class="absolute flex items-center justify-center w-12 h-12 <?php echo $records_bg; ?> rounded-full -left-[1.5rem] ring-8 ring-white dark:ring-gray-900">
                    <?php echo $records_svg; ?>
                </span>

                <h3 class="mb-1 ml-6 text-lg font-semibold text-gray-900 dark:text-white"><?php echo $records['event_type']; ?></h3>
                
                <div class="flex items-center">
                    <time class="flex gap-1 items-center  mb-2 ml-6 text-sm font-medium leading-none text-gray-400 dark:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        
                        <span>
                            <?php echo $date; ?>
                        </span>
                    </time>

                    <div class="flex gap-1 mb-2 ml-6 text-sm font-medium leading-none text-gray-400 dark:text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                        <span class="font-semibold"><?php echo $records['quantity_change']; ?></span>
                    </div>

                </div>

                <p class="mb-4 ml-6 text-base font-normal text-gray-500 dark:text-gray-400"><?php echo $records['event_description'] . ' avec succès'; ?></p>
            </li>

        <?php } ?>

        </ol>

    </div>

</div>



