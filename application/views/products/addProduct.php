
  <div class="h-[1800px]">

    <!-- HEADER SECTION -->

    <div class="header">

      <h1 class="text-[30px] font-bold pointer-events-none">Ajouter produit</h1>

      <a href="<?php echo base_url('Product/edit_first'); ?>" class="group flex items-center gap-4 cursor-pointer no-underline hover:opacity-80 transition-opacity duration-300">

        <p class="group-hover:-translate-x-2 group-hover:tracking-wider duration-500 delay-100 ease-linear">Voir les détails</p>
        <i id="arrow-right" data-feather="arrow-right" class="group-hover:translate-x-5 group-hover:scale-125 transition-all ease-linear duration-450"></i>

      </a>

    </div>

    <!-- MAIN SECTION -->

    <form method="post" action="<?php echo base_url('Product/store');?>" id="addProductForm" class="flex flex-wrap shrink-0 items-start justify-center h-auto w-11/12 m-auto mt-10">

      <!-- product information section -->

      <div class="product-information-card">

        <div class="w-full h-[60px] m-auto p-0 rounded-t-xl">
          <p class="p-input">Information sur le produit</p>
        </div>

        <!-- products inputs -->

        <div class="flex flex-wrap gap-8 items-center shrink-0 p-8 max-xs:py-2 my-6">

          <label for="productName" class="label-input">

            <input type="text" class="peer input-field" id="productName" name="productName" placeholder="product name" required/>
            <span class="span-input"> Nom du produit </span>

            <?php echo form_error('productName'); ?>

          </label>

          <label for="articleCode" class="label-input w-auto mr-auto max-lg:w-full">

            <input type="text" class="peer input-field" id="articleCode" name="articleCode" placeholder="article code" required/>
            <span class="span-input"> Code article </span>

            <?php echo form_error('articleCode'); ?>

          </label>

          <label for="reference" class="label-input w-auto ml-auto max-lg:w-full">

            <input type="text" class="peer input-field" id="reference" name="reference" placeholder="reference" required/>
            <span class="span-input"> Référence </span>

            <?php echo form_error('reference'); ?>

          </label>

          <label for="quantity" class="label-input w-auto ml-auto max-lg:w-full">

            <input autocomplete="off" type="number" class="peer input-field" id="quantity" name="quantity" placeholder="reference" min="0" required/>
            <span class="span-input"> Quantité </span>

            <?php echo form_error('quantity'); ?>

          </label>

          <textarea class="text-input" id="description" name="description" rows="10" placeholder="Entrez toute note descriptive supplémentaire..." required></textarea>

          <?php echo form_error('description'); ?>

        </div>

      </div>

      <!-- supplier information section -->

      <div class="supplier-information-card">

        <div class="w-full h-[60px] m-auto p-0 rounded-t-xl">
          <p class="p-input">Fournisseur</p>
        </div>

        <!-- supplier inputs -->

        <div class="flex flex-wrap items-center shrink-0 gap-8 p-8 max-xs:py-2 my-6">

          <label for="supplierName" class="label-input">

            <input type="text" id="supplierName" name="supplierName" class="peer input-field" placeholder="Supplier name" required/>
            <span class="span-input"> Nom du fournisseur </span>

            <?php echo form_error('supplierName'); ?>

          </label>

          <label for="supplierContact" class="label-input">

            <input type="text" id="supplierContact"  name="supplierContact" class="peer input-field" placeholder="Supplier contact" required/>
            <span class="span-input"> Contact du fournisseur </span>

            <?php echo form_error('supplierContact'); ?>

          </label>

          <div class="w-full">

            <label for="category" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white translate-y-[1.125rem] translate-x-4 bg-white w-fit">Catégorie</label>
            <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-700 text-base rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
              <?php foreach ($category as $categories) { ?>
                <option value = "<?php echo $categories['category_name']; ?>"><?php echo  $categories['category_name']; ?></option>
              <?php } ?>
            </select>

          </div>
          
          <label for="brand" class="label-input">

            <input type="text" id="brand" name="brand" class="peer input-field" placeholder="Brand" required/>
            <span class="span-input"> Marque </span>

            <?php echo form_error('brand'); ?>

          </label>


        </div>

      </div>

      <!-- media section -->

      <div class="media-card">

        <div class="w-full h-[60px] m-auto p-0 rounded-t-xl">
          <p class="p-input">Media</p>
        </div>

        <div class="flex flex-wrap items-center justify-center shrink-0 w-full h-4/5 p-10 max-xs:py-6">

          <div class="flex items-center justify-center h-full w-full border-2 border-dashed border-neutral-300 rounded-md">
            <lottie-player src="https://lottie.host/e4b7dfcc-744b-488b-a6ef-fb608677af8e/IYXtTvRhte.json" background="transparent" speed="1" style="width: 300px; height: 300px" loop autoplay></lottie-player>
          </div>

          <button class="btn-base absolute translate-y-20 py-3 hover:shadow-lg" style="font-family: 'Plus Jakarta Sans', sans-serif" id="upload_image_btn" type="button" data-ripple-light="true" onclick="upload_image();">

            <i id="upload-cloud" data-feather="upload-cloud"></i>
            <p>Publier une image</p>

          </button>

          <!-- hidden input field for folder -->

          <input type="file" name="imageBtn" placeholder="Publiez une image" id="imageBtn" style="display: none" visibility="hidden"/>

        </div>

      </div>

      <!-- SUBMIT PRODUCTS SECTION -->
    
      <div class="flex bottom-0 z-50 items-center justify-center w-full h-10 my-20 p-10 gap-12">

        <button type="submit" id="submitProduct" style="font-family: 'plus-jakarta-sans', sans-serif" class="btn-base ml-auto py-5 hover:opacity-80 text-lg">

          <p>ajouter produit</p>
          <i id="add_product-btn" data-feather="plus"></i>

        </button>

        <a href="<?php echo base_url('Product/list'); ?>" type="button" style="font-family: 'plus-jakarta-sans', sans-serif" class="btn-outlined mr-auto py-5 hover:opacity-80">

          voir les produits
          <i id="details-arrow" data-feather="arrow-right"></i>

        </a>

      </div>
      
    </form>

  </div>

  <!-- all the needed script -->

  <script src="<?php echo base_url() . 'src/js/products/main.js'; ?>"></script>

  <script>

  $(document).ready(function () {
    feather.replace();

    // Binding a click event to the button or the surrounding division
    $("#upload_image_btn").click(function () {
      $("#imageBtn").click();
    });

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

          url: '<?php echo base_url('Product/store'); ?>',
          type: 'POST',
          data: formData,
          dataType: 'json',
          success: function (response) {

            console.log(response);

            if (response.success) {

                // Show toastr success message
                toastr.success(response.message);

                // Clear form inputs
                $('#addProductForm :input').val('');

            } else {

                // Show toastr error message
                toastr.error(response.message);

            }

          },

          error: function (xhr, status, error) {

            console.log('AJAX error:', xhr.responseText);
            console.log(status);
            console.log(error);

              // Show toastr error message for unexpected errors
              toastr.error('Une erreur s\'est produite. Veuillez réessayer ultérieurement.');

          }

      });

    });

  });


  </script>

</html>
