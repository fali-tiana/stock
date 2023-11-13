  <div class="h-[1800px]">

    <!-- HEADER SECTION -->

    <div class="header">

      <h1 class="text-[30px] font-bold pointer-events-none">Détails du produit</h1>

      <div class="flex items-center gap-4 cursor-pointer no-underline transition-opacity duration-300">

        <a href="<?php echo base_url('Product/edit/' . (intval($product['id_product']) + 1)); ?>"><i id="arrow-left" data-feather="arrow-left" class="<?php if ($product['id_product'] == null || $product['id_product'] > $greatest_id || ($product['id_product'] + 1) == null) {echo 'hidden';} ?> hover:scale-150 hover:opacity-60 hover:-translate-x-2 transition-all ease-linear duration-300"></i></a>
        <a href="<?php echo base_url('Product/edit/' . (intval($product['id_product']) - 1)); ?>"><i id="arrow-right" data-feather="arrow-right" class="<?php if ($product['id_product'] == null || $product['id_product'] < $smallest_id || ($product['id_product'] - 1) == null) {echo 'hidden';} ?> hover:scale-150 hover:opacity-60 hover:translate-x-2 transition-all ease-linear duration-300"></i></a>

      </div>

    </div>

    <!-- MAIN SECTION -->

    <form method="post" id="addProductForm" action="<?php echo base_url('Product/update/' . $product['id_product']);?>" class="flex flex-wrap shrink-0 items-start justify-center h-auto w-11/12 m-auto mt-10">

      <!-- product information section -->

      <div class="product-information-card">

        <div class="w-full h-[60px] m-auto p-0 rounded-t-xl">
          <p class="p-input">Information sur le produit</p>
        </div>

        <!-- products inputs -->

        <div class="flex flex-wrap gap-8 items-center shrink-0 p-8 max-xs:py-2 my-6">

          <label for="product_name" class="label-input">

            <input autocomplete="off" type="text" id="productName" name="productName" class="peer input-field" placeholder="product name" value="<?php echo $product['product_name'] ?? 'product not available'; ?>" required/>
            <span class="span-input"> Nom du produit </span>

            <?php echo form_error('productName'); ?>

          </label>

          <label for="article_code" class="label-input w-auto mr-auto max-lg:w-full">

            <input autocomplete="off" type="text" class="peer input-field" id="articleCode" name="articleCode" placeholder="article code" value="<?php echo $product['article_code'] ?? 'N/A'; ?>" required/>
            <span class="span-input"> Code article </span>

            <?php echo form_error('articleCode'); ?>

          </label>

          <label for="reference" class="label-input w-auto ml-auto max-lg:w-full">

            <input autocomplete="off" type="text" class="peer input-field" id="reference" name="reference" placeholder="reference" value="<?php echo $product['reference'] ?? 'N/A'; ?>" required/>
            <span class="span-input"> Référence </span>

            <?php echo form_error('reference'); ?>

          </label>

          <label for="quantity" class="label-input w-auto ml-auto max-lg:w-full">

            <input autocomplete="off" type="number" class="peer input-field" id="quantity" name="quantity" placeholder="reference" value="<?php echo $product['stock_quantity'] ?? 'N/A'; ?>" min="0" required/>
            <span class="span-input"> Quantité </span>

            <?php echo form_error('quantity'); ?>

          </label>

          <textarea id="description" name="description" class="text-input" rows="6" placeholder="Entrez toute note descriptive supplémentaire..." autocomplete="off" style="line-height: 2rem; white-space: no-wrap" required><?php echo $product['technical_properties'] ?? 'not any properties'; ?></textarea>

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

            <input autocomplete="off" type="text" id="supplierName" name="supplierName" class="peer input-field" placeholder="Supplier name" value="<?php echo $product['supplier_name'] ?? 'N/A'; ?>" required/>
            <span class="span-input"> Nom du fournisseur </span>

            <?php echo form_error('supplierName'); ?>

          </label>

          <label for="supplierContact" class="label-input">

            <input autocomplete="off" type="text" id="supplierContact" name="supplierContact" class="peer input-field" placeholder="Supplier contact" value="<?php echo $product['supplier_contact'] ?? 'N/A'; ?>" required/>
            <span class="span-input"> Contact du fournisseur </span>

            <?php echo form_error('supplierContact'); ?>

          </label>

          <label for="category" class="label-input">

            <input autocomplete="off" type="text" id="category" name="category" class="peer input-field" placeholder="Category" value="<?php echo $product['category_name'] ?? 'N/A'; ?>" required/>
            <span class="span-input"> Catégorie </span>

            <?php echo form_error('category'); ?>

          </label>

          <label for="brand" class="label-input">

            <input autocomplete="off" type="text" id="brand" name="brand" class="peer input-field" placeholder="Brand" value="<?php echo $product['brand'] ?? 'N/A'; ?>" required/>
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
            Publier une image

          </button>

          <input type="file" name="image_btn" placeholder="Publiez une image" id="image_btn" style="display: none" visibility="hidden"/>

        </div>

      </div>

      <!-- SUBMIT UPDATE SECTION -->
  
      <div class="flex bottom-0 z-50 items-center justify-center w-full h-10 my-20 p-10 gap-12">
  
        <button type="submit" id="submitProduct" style="font-family: 'plus-jakarta-sans', sans-serif" class="btn-base ml-auto py-5 hover:opacity-80 text-lg">
  
          ajouter modifications
          <i id="add_product-btn" data-feather="plus"></i>
  
        </button>
  
        <a href="<?php echo base_url('Product/list'); ?>" type="button" style="font-family: 'plus-jakarta-sans', sans-serif" class="btn-outlined mr-auto py-5 hover:opacity-80">

          voir les produits
          <i id="details-arrow" data-feather="arrow-right"></i>

        </a>
        
      </div>

    </form>


  </div>

  <script src="<?php echo base_url() . 'src/js/products/main.js'; ?>"></script>
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

          url: '<?php echo base_url('Product/update/' . $product['id_product']); ?>',
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

  </script>
  
</html>
