<div>

    <!-- the blured background -->
    
    <div class="absolute w-full h-screen bg-black/20 z-[250]"></div>
    <div class="fixed h-screen w-full bg-transparent z-[260]">

        <form action="<?php echo base_url() . 'Product/ship/' . $id_product ?>" method="post" class="absolute left-1/2 top-1/2 flex h-[320px] w-[400px] -translate-x-1/2 -translate-y-1/2 flex-col justify-between rounded-xl bg-white px-8 pb-8 pt-6">

            <div id="formSection">

                <!-- first input : the domanial circonscription -->

                <div class="relative mb-4 h-11 w-full min-w-[200px]">
                    <input name="circonscription[]" class="border-gray-200 text-blue-gray-700 disabled:bg-blue-gray-50 peer h-full w-full border-b bg-transparent pb-1.5 pt-4 font-sans text-sm font-normal outline outline-0 transition-all placeholder-shown:border-gray-200 focus:border-primary-500 focus:outline-0 disabled:border-0" placeholder=" " />
                    <label class="after:content[' '] peer-placeholder-shown:text-gray-500 peer-disabled:peer-placeholder-shown:text-blue-gray-500 pointer-events-none absolute -top-1.5 left-0 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-1.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-primary-500 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-primary-500 peer-focus:after:scale-x-100 peer-focus:after:border-primary-500 peer-disabled:text-transparent"> Domanial circonscription </label>
                </div>

                <!-- second input the shipped quantity -->

                <div class="relative mb-6 h-11 w-1/3 min-w-[200px]">
                    <input name="quantityShipped[]" class="border-gray-200 text-blue-gray-700 disabled:bg-gray-50 peer h-full w-full border-b bg-transparent pb-1.5 pt-4 font-sans text-sm font-normal outline outline-0 transition-all placeholder-shown:border-gray-200 focus:border-primary-500 focus:outline-0 disabled:border-0" placeholder=" " />
                    <label class="after:content[' '] peer-placeholder-shown:text-blue-gray-500 peer-disabled:peer-placeholder-shown:text-blue-gray-500 pointer-events-none absolute -top-1.5 left-0 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-500 transition-all after:absolute after:-bottom-1.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-primary-500 after:transition-transform after:duration-300 peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.25] peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-primary-500 peer-focus:after:scale-x-100 peer-focus:after:border-primary-500 peer-disabled:text-transparent"> Quantity </label>
                </div>

            </div>

            <!-- button ship -->

            <button type="submit" class="flex w-fit select-none items-center gap-3 rounded-lg bg-primary-500 py-4 pl-4 pr-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-primary-500/20 transition-all hover:shadow-lg hover:shadow-primary-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
                
                <span class="-translate-y-[1px]">ship product</span>
            </button>

        </form>

        <!-- button add ship -->

        <button type="button"  id="addShipBtn" class="absolute bottom-10 right-8 h-12 w-12 rounded-full bg-white p-3 text-primary-500 shadow-lg hover:bg-white/60 hover:text-primary-700" title="add a new circonscription">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
        </button>

    </div>
</div>

<script src="<?php echo base_url() . 'src/js/products/shipProduct.js' ?>"></script>
