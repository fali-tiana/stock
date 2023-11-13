  <!-- HEADER SECTION -->

  <div class="header">

    <div class="flex items-center">
      <h1 class=" mr-3 text-[30px] font-bold pointer-events-none">Tableau des produits</h1>

      <div class="flex gap-2 first-letter:ml-3">
        <a href="<?php echo base_url('Product/generate_pdf'); ?>" class="first-letter:ml-3 text-[30px] font-bold">
          <lottie-player id="lottie" src="<?php echo base_url('src/json/download.json'); ?>" background="transparent" speed="1" onclick="play()" title="liste des produits"></lottie-player>
        </a>
        <a href="<?php echo base_url('Product/generate_pdf_details'); ?>" class="first-letter:ml-3 text-[30px] font-bold">
          <lottie-player id="lottie1" src="<?php echo base_url('src/json/arrowDownCircle.json'); ?>" background="transparent" speed="1" onclick="play1()" title="liste des produits avec détails"></lottie-player>
        </a>
      </div>
      
    </div>

    <a href="<?php echo base_url('Product/edit_first'); ?>" class="group flex items-center gap-4 cursor-pointer no-underline hover:opacity-80 transition-opacity duration-300">

      <p class="group-hover:-translate-x-2 group-hover:tracking-wider duration-500 delay-100 ease-linear">Voir les détails</p>
      <i id="arrow-right" data-feather="arrow-right" class="group-hover:translate-x-5 group-hover:scale-125 transition-all ease-linear duration-450"></i>

    </a>

  </div>
  
  <body>
    <table id="myTable" class="display" style="right: 0; ">
      <thead>
        <tr>
          <th>Nom du produit</th>
          <th>Code article</th>
          <th>Reference</th>
          <th>Quantité en stock</th>
          <th>Catégorie</th>
          <th>Marque</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($product as $products) { ?>

          <tr>

            <td><?php echo $products['product_name']; ?></td>
            <td><?php echo $products['article_code']; ?></td>
            <td><?php echo $products['reference']; ?></td>
            <td><?php echo $products['stock_quantity']; ?></td>
            <td><?php echo $products['category_name']; ?></td>
            <td><?php echo $products['brand']; ?></td>

            <td class="flex items-center justify-between flex-wrap">

              <div class="flex items-center w-fit">
                <a href="<?php echo base_url('Product/edit/' . $products['id_product']); ?>" class="flex" id="editBtn" data-id="<?php echo $products['id_product']; ?>">
                  <span class="p-2 bg-primary-100 border border-solid border-primary-500 text-primary-500 hover:bg-primary-100/50 hover:border-primary-800 hover:text-primary-800 rounded-2xl leading-4 transition-all duration-200">modifier</span>
                </a>
              </div>

              <div class="flex items-center w-fit">
                <a href="<?php echo base_url('Product/delete/' . $products['id_product']); ?>" class="flex" id="deleteBtn" data-id="<?php echo $products['id_product']; ?>">
                  <span class="p-2 bg-danger-bg border border-solid border-danger text-danger hover:bg-red-100/50 hover:border-red-700 hover:text-red-700 rounded-2xl leading-4 transition-all duration-200">supprimer</span>
                </a>
              </div>

              <div class="flex items-center w-fit">
                <a href="#" data-modal-toggle="defaultModal" data-id-product="<?php echo intval($products['id_product']); ?>" class="flex shipBtn" id="shipBtn" data-id="<?php echo $products['id_product']; ?>">
                  <span class="p-2 bg-violet-100 border border-solid border-violet-500 text-violet-500 hover:bg-violet-100/50 hover:border-violet-800 hover:text-violet-800 rounded-2xl leading-4 transition-all duration-200">envoyer</span>
                </a>
              </div>

            </td>

          </tr>

        <?php } ?>
  
      </tbody>
    </table>

    <!-- this is the modal that we will show (by default it is hidden) -->

    <!-- Main modal -->


    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 justify-center items-center w-full md:inset-0 h-modal md:h-full z-[200] bg-black-400/50">

        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

            <!-- Modal content -->
            
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">

                <!-- Modal header -->

                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">

                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Expédié le produit
                    </h3>

                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Fermer modale</span>
                    </button>

                </div>

                <!-- Modal body -->

                <form action="<?php echo base_url('Product/ship/' . $products['id_product']); ?>" method="post" id="addProductForm">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="quantityShipped" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantité</label>
                            <input type="text" name="quantityShipped" id="quantityShipped" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product quantity" required="">
                        </div>
                        <div>
                            <label for="circonscription" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Circonscription</label>
                            <input type="text" name="circonscription" id="circonscription" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Domanial Circonscription" required="">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write product description here" style="resize: none;"></textarea>                    
                        </div>
                    </div>

                    <button type="submit" id="submitProduct" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Expédié nouveau produit
                    </button>

                </form>

            </div>
        </div>
    </div>

    
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() . 'src/js/products/datatable.js' ?>"></script>
    <script>
      // the toastr message
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

    $('#submitProduct').on('click', function(e) {

      e.preventDefault();

      // Get form data
      let formData = $('#addProductForm').serialize();
      formData += '&'+'<?php echo $this->security->get_csrf_token_name(); ?>' + '=' + '<?php echo $this->security->get_csrf_hash(); ?>';

      console.log('Serialized Form Data:', formData);

      // Make AJAX request
      $.ajax({

          url: '<?php echo base_url('Product/ship/' . $products['id_product']); ?>',
          type: 'POST',
          data: formData,
          dataType: 'json',
          success: function (response) {

            console.log(response);

            if (response.success) {

                // Show toastr success message
                toastr.success(response.message);

                //close the modal
                $('#defaultModal').toggle();

            } else {

                // Show toastr error message
                toastr.error(response.message);

            }

          },

          error: function (xhr, status, error) {

            // console.log('AJAX error:', xhr.responseText);
            console.log(status);
            console.log(error);

              // Show toastr error message for unexpected errors
              toastr.error('Une erreur s\'est produite. Veuillez réessayer ultérieurement.');

          }

      });

    });

    // generating the pdf for the table products

    function play() {

      // Get the Lottie player element.
      let animation = document.querySelector('#lottie');

      // Play the animation.
      animation.play();

    }

    // generating the pdf for the table products with the details

    function play1() {

      // Get the Lottie player element.
      let animation1 = document.querySelector('#lottie1');

      // Play the animation.
      animation1.play();

    }
    
    </script>
